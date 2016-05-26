<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Libraries\LoadMenu;
use App\Http\Models\ProductCategoryModel;
use App\Http\Requests\ProductCategoryRequest;
use Illuminate\Support\Facades\Session;

class ProductCategoryController extends Controller
{
    private $menu;
    function __construct() {
        $this->menu = new LoadMenu();
        //\Illuminate\Support\Facades\Session::
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('Admin/Product/CateList')->with(['menu'=>$this->menu->ListMenu(ProductCategoryModel::all(), 0)]); 
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create() {
        $category = ProductCategoryModel::all()->toArray();
        return view('Admin/Product/CateAdd')->with(['menu'=>$this->menu->ListMenu($category, 0)]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request) {
        $category = new ProductCategoryModel();
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
            if(ProductCategoryModel::where('alias', $category->alias)->count()==0){break;}else{
                $category->alias .= rand(1, 1000000);
            }
        }
        if(in_array($category->parent_id, $this->menu->AddMenuList(ProductCategoryModel::all(), 0))||$category->parent_id==0){
            if($category->save()){
                return redirect()->route('admin.product.category.index')->with(information('success', 'product.cateaddsuccess'));
            }
            Session::flash('danger',trans('product.cateadderror'));
        }else{
            Session::flash('danger',trans('product.catenoexist'));
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
        $data['item'] = ProductCategoryModel::find($id)->toArray();
        $data['menu'] = $this->menu->ListMenuEdit(ProductCategoryModel::all()->toArray(), 0, $id);
        return view('Admin.Product.CateEdit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, $id) {
        $category = ProductCategoryModel::find($id);
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
            if(ProductCategoryModel::where('alias', $category->alias)->where('id','<>', $id)->count()==0){break;}else{
                $category->alias .= rand(1, 1000000);
            }
        }
        if(in_array($category->parent_id, $this->menu->EditMenuList(ProductCategoryModel::all(), 0, $id))||$category->parent_id==0){
            if($category->save()){
                return redirect()->route('admin.product.category.index',$id)->with(information('success', 'product.cateeditsuccess'));
            }
            Session::flash('danger',trans('product.cateediterror'));
        }else{
            Session::flash('danger',trans('product.catenoexist'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $item = ProductCategoryModel::findOrFail($id)->delete();
        return redirect()->route('admin.product.category.index',$id)->with(information('success', 'product.cateedeletesuccess'));
    }
}
