@extends('Admin.layout')
@section('header')
{{trans('product.cateadd')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('product.cateadd')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{{route('admin.product.category.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>{{trans('product.cateparent')}}</label>
            <select class="form-control" name="selectParent">
                <option value="0">Không lựa chọn</option>
                @foreach($menu as $item)
                <option {{old('selectParent')==$item['id']?'selected="selected"':''}} value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>{{trans('product.catename')}}</label>
            <input class="form-control" name="txtName" value="{{old('txtName')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateavatar')}}</label>
            <input class="form-control" name="txtAvatar" value="{{old('txtAvatar')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateorder')}}</label>
            <input class="form-control" name="txtOrder" value="{{old('txtOrder')==''?999:old('txtOrder')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateseotitle')}}</label>
            <input class="form-control" name="txtSEOTitle" value="{{old('txtSEOTitle')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateseokeyword')}}</label>
            <input class="form-control" name="txtSEOKeyword" value="{{old('txtSEOKeyword')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.cateseodescription')}}</label>
             <input class="form-control" name="txtSEODescription" value="{{old('txtSEODescription')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('admin.alias')}}</label>
             <input class="form-control" name="txtAlias" value="{{old('txtAlias')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.catestatus')}}</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="Y" {{old('rdoStatus')=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="N" {{old('rdoStatus')=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        <button type="submit" class="btn btn-default"><?=trans('admin.buttonAdd')?></button>
        <a href="{{route('admin.product.category.index')}}" class="btn btn-default"><?=trans('admin.buttonReset')?></a>
    <form>
</div>
@endsection
@section('footer')

@endsection