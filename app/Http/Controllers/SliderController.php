<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\SliderModel;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    /* Display a listing of the resource. */
    public function index()
    { 
        return view('Admin.Slider.List')->with(['sliders'=>SliderModel::orderBy('orderby','asc')->get()->toArray()]);
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        return view('Admin.Slider.Add');
    }

    /* Store a newly created resource in storage. */
    public function store(SliderRequest $request)
    {
        $data = Input::all(); unset($data['_token']);
        $slider = new SliderModel();
        foreach ($data as $key=>$value) {
            $slider->$key = $value;
        }
        if($slider->save()){
            return redirect()->route('admin.slider.index')->with(information('success', 'slider.addsuccess'));
        }else{
            Session::flash(information('danger', 'slider.adderror'));
        }
    }

    /* Display the specified resource. */
    public function show($id)
    {
        //
    }

    /* Show the form for editing the specified resource. */
    public function edit($id)
    {
        $data = SliderModel::find($id)->toArray();
        if($data==NULL){
            return redirect()->route('admin.slider.index');
        }
        return view('Admin.Slider.Edit')->with(['item'=>$data]);
    }

    /* Update the specified resource in storage. */
    public function update(SliderRequest $request, $id)
    {
        $data = Input::all(); unset($data['_token']); unset($data['_method']);
        $slider = SliderModel::find($id);
        foreach ($data as $key=>$value) {
            $slider->$key = $value;
        }
        if($slider->save()){
            return redirect()->route('admin.slider.index')->with(information('success', 'slider.editsuccess'));
        }else{
            Session::flash(information('danger', 'slider.editerror'));
        }
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        SliderModel::find($id)->delete();
        
    }
}
