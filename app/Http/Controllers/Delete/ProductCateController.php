<?php
namespace App\Http\Controllers;
use App\Model\ProductCate;
use Illuminate\Http\Request;
class ProductCateController extends Controller{
    public function index(){
        $productcate = ProductCate::all();
        return view('Admin.product.catelist',$productcate);
    }
    public function create(){
        $productcate = ProductCate::all();
        return view('Admin.product.cateadd',$productcate);
    }
    public function edit($id){
        $productcate = ProductCate::all();
        return view('Admin.product.cateedit',$productcate);
    }
    public function adddata(Request $request){
        //validator($data, $rules)
        $formData = Input::only('selectParent', 'txtCateName','txtOrder','rdoStatus');
        $test = array(
            'selectParent' => 'required|integer',
            'txtCateName' => 'required',
            'txtOrder' =>'integer',
            'rdoStatus'=>'required|in:0,1',
        );
        $validator = \Validator::make($formData, $test);
        if (!$validator->fails()) {
            $data = array(
                'name'=>$request->input('txtCateName'),
                'order'=>$request->input('txtOrder'),
                'status'=>$request->input('rdoStatus'),
                'parent_id'=>$request->input('selectParent'),
                'keyword'=>$request->input('txtKeyword'),
                'description'=>$request->input('txtDescription'),
            );
            print_r($data);
        }
        $data = array(
                'name'=>$request->input('txtCateName'),
                'order'=>$request->input('txtOrder'),
                'status'=>$request->input('rdoStatus'),
                'parent_id'=>$request->input('selectParent'),
                'keyword'=>$request->input('txtKeyword'),
                'description'=>$request->input('txtDescription'),
            );
            print_r($data);
    }
}
