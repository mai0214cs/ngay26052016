<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MenuRequest;
use App\Http\Models\MenuTypeModel;
use App\Http\Models\MenuDetailModel;
use Illuminate\Support\Facades\Input;
use App\Http\Libraries\LoadMenu;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    private $menu;
    function __construct() {
        $this->menu = new LoadMenu();
    }
    /* Display a listing of the resource. */
    public function index()
    {
        return view('Admin.Menu.Cate')->with(['data'=>MenuTypeModel::all()->toArray()]);
    }

    /* Show the form for creating a new resource.  */
    public function create()
    {
        if(!isset($_GET['id'])){return;}
        $id = (int) $_GET['id'];
        return view('Admin.Menu.Add')->with(['idType'=>$id, 'menu'=>$this->menu->ListMenu(MenuDetailModel::where('type_id',$id)->orderBy('orderby','asc')->get()->toArray(), 0)]);
    }

    /* Store a newly created resource in storage. */
    public function store(MenuRequest $request)
    {
        $data = Input::all();
        unset($data['_token']); unset($data['id']);
        // Test Menu
        if(in_array($data['parent_id'], $this->menu->AddMenuList(MenuDetailModel::where('type_id',$data['type_id'])->get()->toArray(), 0))||$data['parent_id']==0){
            $menu = new MenuDetailModel();
            foreach ($data as $key => $value) { $menu->$key = $value; }
            if($menu->save()){
                return redirect()->route('admin.menu.show',$data['type_id'])->with(information('success', 'menu.addsuccess'));
            }else{
                Session::flash('status','danger');Session::flash('message',trans('menu.adderror'));
            }
        }
    }

    /* Display the specified resource. */
    public function show($id)
    {
        $menu = $this->menu->ListMenu(MenuDetailModel::where(['type_id'=>$id])->orderBy('orderby','asc')->get()->toArray(),0);
        return view('Admin.Menu.List')->with(['data'=> $menu, 'idType'=>$id]);
    }

    /* Show the form for editing the specified resource. */
    public function edit($id)
    {
        $data['item'] = MenuDetailModel::find($id)->toArray();
        if($data['item']==NULL){ return redirect()->route('admin.menu'); }
        $data['menu'] = $this->menu->ListMenuEdit(MenuDetailModel::where('type_id',$data['item']['type_id'])->orderBy('orderby','asc')->get()->toArray(), 0, $id);
        return view('Admin.Menu.Edit')->with($data);
    }

    /* Update the specified resource in storage. */
    public function update(MenuRequest $request, $id)
    {
        $data = Input::all();
        unset($data['_token']); unset($data['_method']);
        // Test Menu
        if(in_array($data['parent_id'], $this->menu->EditMenuList(MenuDetailModel::where('type_id',$data['type_id'])->get()->toArray(), 0, $id))||$data['parent_id']==0){
            $menu = MenuDetailModel::find($id);
            if(MenuDetailModel::find($id)->where('type_id',$data['type_id'])->count()==0){return redirect()->route('admin.menu.edit',$id);}
            foreach ($data as $key => $value) { $menu->$key = $value; }
            if($menu->save()){
                return redirect()->route('admin.menu.show',$data['type_id'])->with(information('success', 'menu.editsuccess'));
            }else{
                Session::flash('status','danger');Session::flash('message',trans('menu.editerror'));
            }
        }
        return redirect()->route('admin.menu.edit',$id);
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        $listid = MenuDetailModel::select(['id'])->where('parent_id',$id)->get()->toArray();
        foreach ($listid as $item) {
            $menu = MenuDetailModel::find($item['id']);
            $menu->parent_id = 0;
            $menu->save();
        }
        MenuDetailModel::find($id)->delete();
        //redirect()->route('admin.menu.show',$data['type_id']);
    }
}
