<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\NewsListResquest;
use App\Http\Libraries\LoadMenu;
use App\Http\Models\NewsCategoryModul;
use App\Http\Models\NewsListModul;
use Illuminate\Support\Facades\Session;
class NewsListController extends Controller
{
    private $menu;
    public function __construct() {
        $this->menu = new LoadMenu();
    }

    public function index()
    {
        $data['list'] = NewsListModul::all()->toArray();
        $cate = NewsCategoryModul::all()->toArray(); $category = array();
        foreach ($cate as $value) {
            $category[$value['id']] = $value['name'];
        }
        $data['cate'] = $category;
        return view('Admin.News.ListList')->with($data);
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        $data['category'] = $this->menu->ListMenu(NewsCategoryModul::all()->toArray(), 0);
        return view('Admin.News.ListAdd')->with($data);
    }

    /* Store a newly created resource in storage. */
    public function store(NewsListResquest $request)
    {
        $list = new NewsListModul();
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
            if(NewsListModul::where('alias', $list->alias)->count()==0){break;}else{
                $list->alias .= rand(1, 1000000);
            }
        }
        
        if(NewsCategoryModul::where('id',$list->category_id)->count()==1){
            if($list->save()){
                return redirect()->route('admin.news.list.index')->with(information('success', 'news.listaddsuccess'));
            }
            Session::flash('danger',trans('news.listadderror'));
        }else{
            Session::flash('danger',trans('news.listnoexist'));
        }
    }

    /* Display the specified resource.  */
    public function search()
    {
        print_f(Input::all());
    }

    /* Show the form for editing the specified resource. */
    public function edit($id)
    {
        $data['item'] = NewsListModul::find($id)->toArray();
        $data['category'] = $this->menu->ListMenu(NewsCategoryModul::all()->toArray(), 0);
        return view('Admin.News.ListEdit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsListResquest $request, $id)
    {
        $list = NewsListModul::find($id);
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
            if(NewsListModul::where('alias', $list->alias)->where('id','<>',$id)->count()==0){break;}else{
                $list->alias .= rand(1, 1000000);
            }
        }
        
        if(NewsCategoryModul::where('id',$list->category_id)->count()==1){
            if($list->save()){
                Session::flash('success',trans('news.listedituccess'));
                return redirect()->route('admin.news.list.index');
            }
            Session::flash('danger',trans('news.listediterror'));
        }else{
            Session::flash('danger',trans('news.listnoexist'));
        }
        return redirect()->route('admin.news.list.edit',$id);
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        $item = NewsCategoryModul::findOrFail($id)->delete();
        Session::flash('success',trans('news.listedeletesuccess'));
        return redirect()->route('admin.news.list.index');
    }
}
