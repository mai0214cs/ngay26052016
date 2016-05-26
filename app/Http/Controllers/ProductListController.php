<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductListRequest;
use App\Http\Libraries\LoadMenu;
use App\Http\Models\ProductCategoryModel;
use App\Http\Models\ProductListModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ProductListController extends Controller
{
    private $menu;
    public function __construct() {
        $this->menu = new LoadMenu();
    }

    public function index()
    {
        $data['list'] = ProductListModel::all()->toArray();
        
        $data['listpage'] = GetPagination(1, ceil(ProductListModel::count()/config('app.perpage')), config('app.itempage'));
        //print_r($data['listpage']);
        $cate = ProductCategoryModel::all()->toArray(); $category = array();
        foreach ($cate as $value) {
            $category[$value['id']] = $value['name'];
        }
        $data['cate'] = $category;
        
        return view('Admin.Product.ListList')->with($data);
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        $data['category'] = $this->menu->ListMenu(ProductCategoryModel::all()->toArray(), 0);
        return view('Admin.Product.ListAdd')->with($data);
    }

    /* Store a newly created resource in storage. */
    public function store(ProductListRequest $request)
    {
        $list = new ProductListModel();
        $list->name = $request->txtName;
        $list->description = $request->txtDescription;
        $list->detail = $request->txtDetail;
        $list->avatar = $request->txtAvatar;
        $list->category_id = $request->selectParent;
        $list->orderby = $request->txtOrder;
        $list->seotitle = $request->txtSEOTitle==''?$list->name:$request->txtSEOTitle;
        $list->seodescription = $request->txtSEODescription;
        $list->seokeywords = $request->txtSEOKeyword;
        $list->status = $request->rdoStatus;
        $list->new = $request->rdonew;
        $list->hot = $request->rdohot;
        $list->feature = $request->rdofeature;
        $list->code = $request->txtCode;
        $list->price = $request->txtPrice;
        $list->promotionprice = $request->txtPromotionPrice;
        $list->includedvat = $request->rdovat;
        $this->quantity = $request->txtQuantity;
        $this->warranty = $request->txtWarranty;
        
        
        $alias = $request->txtAlias;
        $list->alias = stripUnicode($alias==''?$list->name:$alias);
        for(;;){
            if(ProductListModel::where('alias', $list->alias)->count()==0){break;}else{
                $list->alias .= rand(1, 1000000);
            }
        }
        
        if(ProductCategoryModel::where('id',$list->category_id)->count()==1){
            if($list->save()){
                return redirect()->route('admin.product.list.index')->with(information('success', 'product.listaddsuccess'));
            }
            Session::flash('danger',trans('product.listadderror'));
        }else{
            Session::flash('danger',trans('product.listnoexist'));
        }
    }

    /* Display the specified resource.  */
    public function search()
    {
        $list = new ProductListModel();
        $data = Input::all();$where=array();
        if(isset($data['name'])){$where[] = array('name', 'like', '%'.$data['name'].'%');}
        if(isset($data['category_id'])){if((int) $data['category_id']>0){$where[] = array('category_id', (int) $data['category_id']);}}
        if(isset($data['price0'])){if((int) $data['price0']>0){$where[] = array('price','>=', (int) $data['price0']);}}
        if(isset($data['price1'])){if((int) $data['price1']>0){$where[] = array('price','<=', (int) $data['price1']);}}
        if(isset($data['date0'])){if($data['date0']!=''){$where[] = array('created_at','>=', $data['date0']);}}
        if(isset($data['date1'])){if($data['date1']!=''){$where[] = array('created_at','<=', $data['date1']);}}
        if(isset($data['action'])){
            switch ($data['action']) {
                case 0: $where[] = array('new', 'Y'); break;
                case 1: $where[] = array('promotionprice','>','0'); break;
                case 2: $where[] = array('feature', 'Y'); break;
                case 3: $where[] = array('hot', 'Y'); break;
            }
        }
        if(isset($data['status'])){
            if(in_array($data['status'], array('Y','N'))){
                $where[] = array('status', $data['status']);
            }
        }
        $result = ProductListModel::where($where)->orderBy('id','desc')->get()->toArray();
        
        foreach ($result as $key=>$item) {
            $result[$key]['avatar'] = imageReset($result[$key]['avatar']);
            $result[$key]['price'] = number_format($result[$key]['price'], 0, ',', '.');
            $result[$key]['promotionprice'] = number_format($result[$key]['promotionprice'], 0, ',', '.');
        }
        return response()->json($result);
        //return response()->json($result);
        //echo json_encode($result);
        //return response($result, 200)->header('Content-Type', 'json');
    }

    /* Show the form for editing the specified resource. */
    public function edit($id)
    {
        $data['item'] = ProductListModel::find($id)->toArray();
        $data['category'] = $this->menu->ListMenu(ProductCategoryModel::all()->toArray(), 0);
        return view('Admin.Product.ListEdit')->with($data);
    }

    /* Update the specified resource in storage.  */
    public function update(ProductListRequest $request, $id)
    {
        $list = ProductListModel::find($id);
        $list->name = $request->txtName;
        $list->description = $request->txtDescription;
        $list->detail = $request->txtDetail;
        $list->avatar = $request->txtAvatar;
        $list->category_id = $request->selectParent;
        $list->orderby = $request->txtOrder;
        $list->seotitle = $request->txtSEOTitle==''?$list->name:$request->txtSEOTitle;
        $list->seodescription = $request->txtSEODescription;
        $list->seokeywords = $request->txtSEOKeyword;
        $list->status = $request->rdoStatus;
        $list->new = $request->rdonew;
        $list->hot = $request->rdohot;
        $list->feature = $request->rdofeature;
        $alias = $request->txtAlias;
        $list->alias = stripUnicode($alias==''?$list->name:$alias);
        for(;;){
            if(ProductListModel::where('alias', $list->alias)->where('id','<>',$id)->count()==0){break;}else{
                $list->alias .= rand(1, 1000000);
            }
        }
        
        if(ProductCategoryModel::where('id',$list->category_id)->count()==1){
            if($list->save()){
                Session::flash('success',trans('product.listedituccess'));
                return redirect()->route('admin.product.list.index');
            }
            Session::flash('danger',trans('product.listediterror'));
        }else{
            Session::flash('danger',trans('product.listnoexist'));
        }
        return redirect()->route('admin.product.list.edit',$id);
    }

    /* Remove the specified resource from storage. */
    public function delete($id)
    {
        $item = ProductListModel::findOrFail($id)->delete();
        Session::flash('success',trans('product.listedeletesuccess'));
        return redirect()->route('admin.product.list.index');
    }
    public function status($type, $id){
        $sType = array('new','hot','feature','status'); if(!isset($sType[$type])){echo 'N'; return;}
        $data = ProductListModel::findOrFail($id);
        $dataid = ProductListModel::findOrFail($id)->toArray();
        $fields = $sType[$type];
        $data->$fields = $dataid[$fields]=='N'?'Y':'N';
        $data->save();
        
    }
}
