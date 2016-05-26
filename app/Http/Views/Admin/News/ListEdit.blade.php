@extends('Admin.layout')
@section('header')
{{trans('news.listedit')}}
@endsection
@section('content')
<link href="/src/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<script src="/src/fancybox/jquery.fancybox.js" type="text/javascript"></script>
<script src="/src/fancybox/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>
<script src="/src/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="/src/ckfinder/ckfinder.js" type="text/javascript"></script>

<div class="col-lg-12">
    <h1 class="page-header">{{trans('news.listedit')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{{route('admin.news.list.update',$item['id'])}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="id" value="{{$item['id']}}" />
        <div class="form-group">
            <label>{{trans('news.listparent')}}</label>
            <select class="form-control" name="selectParent">
                @foreach($category as $cate)
                <option {{$item['category_id']==$cate['id']?'selected="selected"':''}} value="{{$cate['id']}}">{{$cate['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>{{trans('news.listname')}}</label>
            <input class="form-control" name="txtName" value="{{$item['name']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listavatar')}}</label>
            <div class="imagetxtAvatar"><img src="{{imageReset($item['avatar'])}}" alt="Hình ảnh" /></div>
            <input type="hidden" class="form-control" name="txtAvatar" value="{{imageReset($item['avatar'])}}" />
            <input onclick="selectFileWithCKFinder('txtAvatar')" type="button" value="Chọn hình ảnh">
        </div>
        <div class="form-group">
            <label>{{trans('news.listdescription')}}</label>
            <input class="form-control" name="txtDescription" value="{{$item['description']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listdetail')}}</label>
            <textarea name="txtDetail" id="txtDetail"><?= $item['detail'] ?></textarea>
            <script>CKEDITOR.replace('txtDetail');</script>
        </div>
        <div class="form-group">
            <label>{{trans('news.listorder')}}</label>
            <input class="form-control" name="txtOrder" value="{{$item['orderby']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listseotitle')}}</label>
            <input class="form-control" name="txtSEOTitle" value="{{$item['seotitle']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listseokeyword')}}</label>
            <input class="form-control" name="txtSEOKeyword" value="{{$item['seokeywords']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listseodescription')}}</label>
            <input class="form-control" name="txtSEODescription" value="{{$item['seodescription']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('admin.alias')}}</label>
            <input class="form-control" name="txtAlias" value="{{$item['alias']}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.liststatus')}}</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="Y" {{$item['status']=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="N" {{$item['status']=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        <div class="form-group">
            <label>{{trans('news.listnew')}}</label>
            <label class="radio-inline">
                <input name="rdonew" value="Y" {{$item['new']=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdonew" value="N" {{$item['new']=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <div class="form-group">
            <label>{{trans('news.listhot')}}</label>
            <label class="radio-inline">
                <input name="rdohot" value="Y" {{$item['hot']=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdohot" value="N" {{$item['hot']=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <div class="form-group">
            <label>{{trans('news.listfeature')}}</label>
            <label class="radio-inline">
                <input name="rdofeature" value="Y" {{$item['feature']=='Y'?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdofeature" value="N" {{$item['feature']=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <button type="submit" class="btn btn-default"><?= trans('admin.buttonEdit') ?></button>
        <a href="{{route('admin.news.list.index')}}" class="btn btn-default"><?= trans('admin.buttonReset') ?></a>
        <form>
            </div>
            @endsection
            @section('footer')

            <script>
                function selectFileWithCKFinder(elementname) {
                    var element = $('[name="'+elementname+'"]');
                    var image = $('.image'+elementname);
                    CKFinder.popup({
                        chooseFiles: true,
                        width: 800,
                        height: 600,
                        onInit: function (finder) {
                            finder.on('files:choose', function (evt) {
                                var file = evt.data.files.first();
                                element.val(file.getUrl());
                                image.html('<img src="' + file.getUrl() + '" alt="Avatar" style="width:100px;" />');
                            });

                            finder.on('file:choose:resizedImage', function (evt) {
                                element.val(evt.data.resizedUrl);
                                image.html('<img src="' + evt.data.resizedUrl + '" alt="Avatar" style="width:100px;" />');
                            });
                        }
                    });
                }
            </script>
            @endsection