@extends('Admin.layout')
@section('header')
{{trans('news.listadd')}}
@endsection
@section('content')
<link href="/src/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<script src="/src/fancybox/jquery.fancybox.js" type="text/javascript"></script>
<script src="/src/fancybox/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>
<script src="/src/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="/src/ckfinder/ckfinder.js" type="text/javascript"></script>

<div class="col-lg-12">
    <h1 class="page-header">{{trans('news.listadd')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{{route('admin.news.list.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>{{trans('news.listparent')}}</label>
            <select class="form-control" name="selectParent">
                @foreach($category as $item)
                <option {{old('selectParent')==$item['id']?'selected="selected"':''}} value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>{{trans('news.listname')}}</label>
            <input class="form-control" name="txtName" value="{{old('txtName')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listavatar')}}</label>
            <div class="imagetxtAvatar"><img src="/image.png" alt="Hình ảnh" /></div>
            <input type="hidden" class="form-control" name="txtAvatar" value="{{old('txtAvatar')}}" />
            <input onclick="selectFileWithCKFinder('txtAvatar')" type="button" value="Chọn hình ảnh">
        </div>
        <div class="form-group">
            <label>{{trans('news.listdescription')}}</label>
            <input class="form-control" name="txtDescription" value="{{old('txtDescription')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listdetail')}}</label>
            <textarea name="txtDetail" id="txtDetail"><?= old('txtDetail') ?></textarea>
            <script>CKEDITOR.replace('txtDetail');</script>
        </div>
        <div class="form-group">
            <label>{{trans('news.listorder')}}</label>
            <input class="form-control" name="txtOrder" value="{{old('txtOrder')==''?999:old('txtOrder')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listseotitle')}}</label>
            <input class="form-control" name="txtSEOTitle" value="{{old('txtSEOTitle')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listseokeyword')}}</label>
            <input class="form-control" name="txtSEOKeyword" value="{{old('txtSEOKeyword')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.listseodescription')}}</label>
            <input class="form-control" name="txtSEODescription" value="{{old('txtSEODescription')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('admin.alias')}}</label>
            <input class="form-control" name="txtAlias" value="{{old('txtAlias')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('news.liststatus')}}</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" {{old('rdoStatus')==1?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="0" {{old('rdoStatus')==0?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <div class="form-group">
            <label>{{trans('news.listnew')}}</label>
            <label class="radio-inline">
                <input name="rdonew" value="Y" {{old('rdonew')==1?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdonew" value="N" {{old('rdonew')==0?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <div class="form-group">
            <label>{{trans('news.listhot')}}</label>
            <label class="radio-inline">
                <input name="rdohot" value="Y" {{old('rdohot')==1?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdohot" value="N" {{old('rdohot')==0?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <div class="form-group">
            <label>{{trans('news.listfeature')}}</label>
            <label class="radio-inline">
                <input name="rdofeature" value="Y" {{old('rdofeature')==1?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdofeature" value="N" {{old('rdofeature')==0?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <button type="submit" class="btn btn-default"><?= trans('admin.buttonAdd') ?></button>
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