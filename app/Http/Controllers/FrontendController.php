<?php

namespace App\Http\Controllers;
use App\Http\Models\ContentHTMLModel;
use App\Http\Models\MenuTypeModel;
use App\Http\Models\MenuDetailModel;
use App\Http\Libraries\LoadMenu;
use App\Http\Models\ConfigModel;

class FrontendController extends Controller
{
    private $data = array();
    public function __construct() {
        // Get Setup
        $config = ConfigModel::all()->toArray();
        foreach ($config as $item) {
            $this->data['Configs'][$item['key']] = $item['value'];
        }
        
        // Get Menu
        $contentMenu = MenuTypeModel::orderBy('id','asc')->get();
        foreach ($contentMenu as $item) {
            $this->data['ModulsMenu'][$item->name] = $item;
        }
        // Get Content HTML
        $contentHTML = ContentHTMLModel::select(['name','value'])->orderBy('id','asc')->get()->toArray();
        foreach ($contentHTML as $item) {
            $this->data['ModulsContentHTML'][$item['name']] = $item['value'];
        }
        $this->data['ModulMainMenu'] = (new LoadMenu())->ShowMenu(MenuDetailModel::where(['type_id'=>1, 'status'=>'Y'])->get()->toArray(), 0); 
    }

    public function index(){
        $this->data['ModulsSlider'] = \App\Http\Models\SliderModel::select(['image','name'])->where(['status'=>'Y'])->orderBy('orderby','asc')->get()->toArray();
        $this->data['ModulProductFeature'] = \App\Http\Models\ProductListModel::where(['feature'=>'Y'])->orderBy('id','desc')->skip(0)->take(4)->get()->toArray();
        $this->data['ModulProductNew'] = \App\Http\Models\ProductListModel::where(['new'=>'Y'])->orderBy('id','desc')->skip(0)->take(4)->get()->toArray();
        return view('Frontend.Home')->with($this->data);
    }
    public function news(){
        return view('Frontend.News')->with($this->data);
    }
    public function categorynews(){
        return view('Frontend.NewsCategory')->with($this->data);
    }
    public function product(){
        return view('Frontend.Product')->with($this->data);
    }
    public function categoryproduct(){
        return view('Frontend.ProductCategory')->with($this->data);
    }
}
