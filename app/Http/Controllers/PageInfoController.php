<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\PageInfoModel;
use Illuminate\Support\Facades\Input;

class PageInfoController extends Controller
{
    public function index()
    {
        return view('Admin.PageInfo.List')->with(['lists'=>PageInfoModel::all()->toArray()]);
    }

    public function edit($id)
    {
        return view('Admin.PageInfo.Edit')->with(['item'=>  PageInfoModel::find($id)->toArray()]);
    }
    public function update(Request $request, $id)
    {
        $data = Input::all(); unset($data['_token']); unset($data['_method']);
        $page = PageInfoModel::find($id);
        foreach ($data as $key => $value) {
            $page->$key = $value;
        }
        $page->save();
        return redirect()->route('admin.pageinfo.index');
    }
}
