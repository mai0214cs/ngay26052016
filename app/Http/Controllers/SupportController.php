<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Models\SupportModel;
use App\Http\Requests\SupportRequest;

class SupportController extends Controller
{
    /* Display a listing of the resource. */
    public function index()
    {
        return view('Admin.Support.List')->with(['supports'=>SupportModel::orderBy('orderby','asc')->get()->toArray()]);
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        return view('Admin.Support.Add');
    }

    /* Store a newly created resource in storage. */
    public function store(SupportRequest $request)
    {
        $data = Input::all(); unset($data['_token']);
        $support = new SupportModel();
        foreach ($data as $key=>$value) {
            $support->$key = $value;
        }
        if($support->save()){
            return redirect()->route('admin.support.index')->with(information('success', 'support.addsuccess'));
        }else{
            Session::flash(information('danger', 'support.adderror'));
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
        $data = SupportModel::find($id)->toArray();
        if($data==NULL){
            return redirect()->route('admin.support.index');
        }
        return view('Admin.Support.Edit')->with(['item'=>$data]);
    }

    /* Update the specified resource in storage. */
    public function update(SupportRequest $request, $id)
    {
        $data = Input::all(); unset($data['_token']); unset($data['_method']);
        $support = SupportModel::find($id);
        foreach ($data as $key=>$value) {
            $support->$key = $value;
        }
        if($support->save()){
            return redirect()->route('admin.support.index')->with(information('success', 'support.editsuccess'));
        }else{
            return redirect()->route('admin.support.index')->with(information('danger', 'support.editerror'));
        }
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        SupportModel::find($id)->delete();
    }
}
