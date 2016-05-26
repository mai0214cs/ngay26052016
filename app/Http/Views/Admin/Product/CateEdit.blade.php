@extends('Admin.layout')
@section('header')
{{trans('product.cateedit')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('product.cateedit')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{{route('admin.product.category.update',$item['id'])}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="id" value="{{$item['id']}}" />
        <div class="form-group">
            <label>{{trans('product.cateparent')}}</label>
            <select class="form-control" name="selectParent">
                <option value="0">Không lựa chọn</option>
                @foreach($menu as $m)
                <option {{$item['parent_id']==$m['id']?'selected="selected"':''}} value="{{$m['id']}}">{{$m['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>{{trans('product.catename')}}</label>
            <input class="form-control" name="txtName" value="{{$item['name']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateavatar')}}</label>
            <input class="form-control" name="txtAvatar" value="{{$item['avatar']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateorder')}}</label>
            <input class="form-control" name="txtOrder" value="{{$item['orderby']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateseotitle')}}</label>
            <input class="form-control" name="txtSEOTitle" value="{{$item['seotitle']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateseokeyword')}}</label>
            <input class="form-control" name="txtSEOKeyword" value="{{$item['seokeywords']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateseodescription')}}</label>
             <input class="form-control" name="txtSEODescription" value="{{$item['seodescription']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('admin.alias')}}</label>
             <input class="form-control" name="txtAlias" value="{{$item['alias']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.catestatus')}}</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="Y" {{$item['status']=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="N" {{$item['status']=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        <button type="submit" class="btn btn-default"><?=trans('admin.buttonEdit')?></button>
        <a href="{{route('admin.product.category.index')}}" class="btn btn-default"><?=trans('admin.buttonReset')?></a>
    <form>
</div>
@endsection
@section('footer')

@endsection