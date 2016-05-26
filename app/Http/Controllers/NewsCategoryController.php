<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Libraries\LoadMenu;
use App\Http\Models\NewsCategoryModul;
use App\Http\Requests\NewsCategoryRequest;
use Illuminate\Support\Facades\Session;

class NewsCategoryController extends Controller {
    private $menu;
    function __construct() {
        $this->menu = new LoadMenu();
        //\Illuminate\Support\Facades\Session::
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('Admin/News/CateList')->with(['menu'=>$this->menu->ListMenu(NewsCategoryModul::all(), 0)]); 
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create() {
        $category = NewsCategoryModul::all()->toArray();
        return view('Admin/News/CateAdd')->with(['menu'=>$this->menu->ListMenu($category, 0)]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(NewsCategoryRequest $request) {
        $category = new NewsCategoryModul();
        $category->name = $request->txtName;
        $category->avatar = $request->txtAvatar;
        $category->parent_id = $request->selectParent;
        $category->orderby = $request->txtOrder;
        $category->seotitle = $request->txtSEOTitle==''?$category->name:$request->txtSEOTitle;
        $category->seodescription = $request->txtSEODescription;
        $category->seokeywords = $request->txtSEOKeyword;
        $category->status = $request->rdoStatus;
        $alias = $request->txtAlias;
        $category->alias = stripUnicode($alias==''?$category->name:$alias);
        for(;;){
            if(NewsCategoryModul::where('alias', $category->alias)->count()==0){break;}else{
                $category->alias .= rand(1, 1000000);
            }
        }
        if(in_array($category->parent_id, $this->menu->AddMenuList(NewsCategoryModul::all(), 0))||$category->parent_id==0){
            if($category->save()){
                return redirect()->route('admin.news.category.index')->with(information('success', 'news.cateaddsuccess'));
            }
            Session::flash('danger',trans('news.cateadderror'));
        }else{
            Session::flash('danger',trans('news.catenoexist'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $data['item'] = NewsCategoryModul::find($id)->toArray();
        $data['menu'] = $this->menu->ListMenuEdit(NewsCategoryModul::all()->toArray(), 0, $id);
        return view('Admin.News.CateEdit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsCategoryRequest $request, $id) {
        $category = NewsCategoryModul::find($id);
        $category->name = $request->txtName;
        $category->avatar = $request->txtAvatar;
        $category->parent_id = $request->selectParent;
        $category->orderby = $request->txtOrder;
        $category->seotitle = $request->txtSEOTitle==''?$category->name:$request->txtSEOTitle;
        $category->seodescription = $request->txtSEODescription;
        $category->seokeywords = $request->txtSEOKeyword;
        $category->status = $request->rdoStatus;
        $alias = $request->txtAlias;
        $category->alias = stripUnicode($alias==''?$category->name:$alias);
        for(;;){
            if(NewsCategoryModul::where('alias', $category->alias)->where('id','<>', $id)->count()==0){break;}else{
                $category->alias .= rand(1, 1000000);
            }
        }
        if(in_array($category->parent_id, $this->menu->EditMenuList(NewsCategoryModul::all(), 0, $id))||$category->parent_id==0){
            if($category->save()){
                return redirect()->route('admin.news.category.index',$id)->with(information('success', 'news.cateeditsuccess'));
            }
            Session::flash('danger',trans('news.cateediterror'));
        }else{
            Session::flash('danger',trans('news.catenoexist'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $item = NewsCategoryModul::findOrFail($id)->delete();
        return redirect()->route('admin.news.category.index',$id)->with(information('success', 'news.cateedeletesuccess'));
    }

}
