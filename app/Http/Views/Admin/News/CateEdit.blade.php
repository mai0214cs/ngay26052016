@extends('Admin.layout')
@section('header')
{{trans('news.cateedit')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('news.cateedit')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{{route('admin.news.category.update',$item['id'])}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="id" value="{{$item['id']}}" />
        <div class="form-group">
            <label>{{trans('news.cateparent')}}</label>
            <select class="form-control" name="selectParent">
                <option value="0">Không lựa chọn</option>
                @foreach($menu as $m)
                <option {{$item['parent_id']==$m['id']?'selected="selected"':''}} value="{{$m['id']}}">{{$m['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>{{trans('news.catename')}}</label>
            <input class="form-control" name="txtName" value="{{$item['name']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.cateavatar')}}</label>
            <input class="form-control" name="txtAvatar" value="{{$item['avatar']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.cateorder')}}</label>
            <input class="form-control" name="txtOrder" value="{{$item['orderby']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.cateseotitle')}}</label>
            <input class="form-control" name="txtSEOTitle" value="{{$item['seotitle']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.cateseokeyword')}}</label>
            <input class="form-control" name="txtSEOKeyword" value="{{$item['seokeywords']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.cateseodescription')}}</label>
             <input class="form-control" name="txtSEODescription" value="{{$item['seodescription']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('admin.alias')}}</label>
             <input class="form-control" name="txtAlias" value="{{$item['alias']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.catestatus')}}</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" {{$item['status']==1?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="0" {{$item['status']==0?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        <button type="submit" class="btn btn-default"><?=trans('admin.buttonEdit')?></button>
        <a href="{{route('admin.news.category.index')}}" class="btn btn-default"><?=trans('admin.buttonReset')?></a>
    <form>
</div>
@endsection
@section('footer')

@endsection