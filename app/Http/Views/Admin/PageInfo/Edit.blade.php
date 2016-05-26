@extends('Admin.layout')
@section('header')
{{trans('pageinfo.edit')}}
@endsection
@section('content')
<link href="/src/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<script src="/src/fancybox/jquery.fancybox.js" type="text/javascript"></script>
<script src="/src/fancybox/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>
<script src="/src/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="/src/ckfinder/ckfinder.js" type="text/javascript"></script>


@if(count($errors->all())>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<form action="{{route('admin.pageinfo.update',$item['id'])}}" method="POST" class="form-horizontal" role="form">
    <div class="col-lg-12">
        <h1 class="page-header">{{trans('pageinfo.edit')}}</h1>
    </div>
    <div class="clearfix"></div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT" />

    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Thông tin chung</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('pageinfo.name')}}</label><div class="col-sm-9">
                        <input class="form-control" name="name" value="{{$item['name']}}" /></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('pageinfo.avatar')}}</label><div class="col-sm-9">
                        <div class="imagetavatar"><img src="{{imageReset($item['avatar'])}}" alt="Hình ảnh" /></div>
                        <input type="hidden" class="form-control" name="avatar" value="{{imageReset($item['avatar'])}}" />
                        <input onclick="selectFileWithCKFinder('avatar')" type="button" value="Chọn hình ảnh"></div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('pageinfo.description')}}</label><div class="col-sm-9">
                        <textarea class="form-control" name="description">{{$item['description']}}</textarea></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Thông tin SEO</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('pageinfo.seotitle')}}</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="seotitle" value="{{$item['seotitle']}}" /></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('pageinfo.seokeywords')}}</label><div class="col-sm-9">
                        <input class="form-control" name="seokeywords" value="{{$item['seokeywords']}}" /></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('pageinfo.seodescription')}}</label><div class="col-sm-9">
                        <input class="form-control" name="seodescription" value="{{$item['seodescription']}}" /></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('pageinfo.alias')}}</label><div class="col-sm-9">
                        <input class="form-control" name="alias" value="{{$item['alias']}}" /></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">{{trans('pageinfo.status')}}</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input name="status" value="Y" {{$item['status']=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="N" {{$item['status']=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
                        </label>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>{{trans('pageinfo.detail')}}</label>
            <textarea name="detail" id="detail"><?= $item['detail'] ?></textarea>
            <script>CKEDITOR.replace('detail');</script>
        </div>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <button type="submit" class="btn btn-default"><?= trans('admin.buttonEdit') ?></button>
        <a href="{{route('admin.pageinfo.index')}}" class="btn btn-default"><?= trans('admin.buttonReset') ?></a>

    </div>
    <form>
        @endsection
        @section('footer')

        <style>
            .imagetxtAvatar img {
                width: 100px;
            }
        </style>
        @endsection