<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ContentHTMLModel;

class ContentHTMLController extends Controller
{
    /* Display a listing of the resource.  */
    public function index()
    {
        return view('Admin.ContentHTML.List')->with(['data'=> ContentHTMLModel::all()->toArray()]);
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        //
    }

    /* Store a newly created resource in storage. */
    public function store(Request $request)
    {
        //
    }

    /* Display the specified resource. */
    public function show($id)
    {
        //
    }

    /* Show the form for editing the specified resource. */
    public function edit($id)
    {
        return view('Admin.ContentHTML.Edit')->with(['item'=>ContentHTMLModel::find($id)->get()->toArray()]);
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, $id)
    {
        $data = ContentHTMLModel::find($id);
        $data->value = $request->value;
        $data->save();
        return redirect()->route('admin.contenthtml.index');
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        //
    }
}
