@extends('Admin.layout')
@section('header')
{{trans('menu.edit')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('menu.edit')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<!-- /.col-lg-12 -->

<div class="col-lg-12">
    <form action="{{route('admin.menu.update',$item['id'])}}" method="POST" class="form-horizontal" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="type_id" value="{{$item['type_id']}}" />
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('menu.name')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{$item['name']}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('menu.parent')}}</label>
            <div class="col-sm-10">
                <select class="form-control" name="parent_id">
                    <option value="0">---</option>
                    @foreach($menu as $m)
                    <option {{$item['parent_id']==$m['id']?'selected="selected"':''}} value="{{$m['id']}}">{{$m['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('menu.icon')}}</label>
            <div class="col-sm-10">
                <div class="imageimage">
                    <img style="width: 75px;" src="{{imageReset($item['image'])}}" alt="Avatar" />
                </div>
                <input type="hidden" class="form-control" name="image" id="image" value="{{imageReset($item['image'])}}" />
                <input onclick="selectFileWithCKFinder('image')" type="button" value="Chọn hình ảnh">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('menu.order')}}</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="orderby" value="{{$item['orderby']}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('menu.link')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="link" value="{{$item['link']}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('menu.description')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" value="{{$item['description']}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('menu.target')}}</label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input name="target" value="N" {{$item['target']=='N'?'checked="checked"':''}} type="radio">{{trans('admin.no')}}
                </label>
                <label class="radio-inline">
                    <input name="target" value="Y" {{$item['target']=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.yes')}}
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('menu.status')}}</label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input name="status" value="Y" {{$item['status']=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
                </label>
                <label class="radio-inline">
                    <input name="status" value="N" {{$item['status']=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-default"><?= trans('admin.buttonEdit') ?></button>
        <a href="{{route('admin.menu.show',$item['type_id'])}}" class="btn btn-default"><?= trans('admin.buttonReset') ?></a>
    </form>
</div>
@endsection
@section('footer')

@endsection