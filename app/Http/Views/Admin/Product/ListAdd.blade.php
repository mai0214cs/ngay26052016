@extends('Admin.layout')
@section('header')
{{trans('product.listadd')}}
@endsection
@section('content')


<div class="col-lg-12">
    <h1 class="page-header">{{trans('product.listadd')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{{route('admin.product.list.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>{{trans('product.listparent')}}</label>
            <select class="form-control" name="selectParent">
                @foreach($category as $item)
                <option {{old('selectParent')==$item['id']?'selected="selected"':''}} value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>{{trans('product.listname')}}</label>
            <input class="form-control" name="txtName" value="{{old('txtName')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listavatar')}}</label>
            <div class="imagetxtAvatar"><img src="/image.png" alt="Hình ảnh" /></div>
            <input type="hidden" class="form-control" name="txtAvatar" value="{{old('txtAvatar')}}" />
            <input onclick="selectFileWithCKFinder('txtAvatar')" type="button" value="Chọn hình ảnh">
        </div>
        
        <div class="form-group">
            <label>{{trans('product.listcode')}}</label>
            <input class="form-control" name="txtCode" value="{{old('txtCode')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listprice')}}</label>
            <input class="form-control" type="number" name="txtPrice" value="{{old('txtPrice')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listpromotionprice')}}</label>
            <input class="form-control" type="number" name="txtPromotionPrice" value="{{old('txtPromotionPrice')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listvat')}}</label>
            <label class="radio-inline">
                <input name="rdovat" value="Y" {{old('rdovat')=='Y'?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdovat" value="N" {{old('rdovat')=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        <div class="form-group">
            <label>{{trans('product.listquantity')}}</label>
            <input class="form-control" type="number" name="txtQuantity" min='0' value="{{old('txtQuantity')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listwarranty')}}</label>
            <input class="form-control" type="number" name="txtWarranty" min='0' max='100' value="{{old('txtWarranty')}}" />
        </div>
        
        
        
        <div class="form-group">
            <label>{{trans('product.listdescription')}}</label>
            <input class="form-control" name="txtDescription" value="{{old('txtDescription')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listdetail')}}</label>
            <textarea name="txtDetail" id="txtDetail"><?= old('txtDetail') ?></textarea>
            <script>CKEDITOR.replace('txtDetail');</script>
        </div>
        <div class="form-group">
            <label>{{trans('product.listorder')}}</label>
            <input class="form-control" name="txtOrder" value="{{old('txtOrder')==''?999:old('txtOrder')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listseotitle')}}</label>
            <input class="form-control" name="txtSEOTitle" value="{{old('txtSEOTitle')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listseokeyword')}}</label>
            <input class="form-control" name="txtSEOKeyword" value="{{old('txtSEOKeyword')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.listseodescription')}}</label>
            <input class="form-control" name="txtSEODescription" value="{{old('txtSEODescription')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('admin.alias')}}</label>
            <input class="form-control" name="txtAlias" value="{{old('txtAlias')}}" />
        </div>
        <div class="form-group">
            <label>{{trans('product.liststatus')}}</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="Y" {{old('rdoStatus')=='Y'?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="N" {{old('rdoStatus')=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <div class="form-group">
            <label>{{trans('product.listnew')}}</label>
            <label class="radio-inline">
                <input name="rdonew" value="Y" {{old('rdonew')=='Y'?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdonew" value="N" {{old('rdonew')=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <div class="form-group">
            <label>{{trans('product.listhot')}}</label>
            <label class="radio-inline">
                <input name="rdohot" value="Y" {{old('rdohot')=='Y'?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdohot" value="N" {{old('rdohot')=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <div class="form-group">
            <label>{{trans('product.listfeature')}}</label>
            <label class="radio-inline">
                <input name="rdofeature" value="Y" {{old('rdofeature')=='Y'?'':'checked="checked"'}} type="radio">{{trans('admin.show')}}
            </label>
            <label class="radio-inline">
                <input name="rdofeature" value="N" {{old('rdofeature')=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
            </label>
        </div>
        
        <button type="submit" class="btn btn-default"><?= trans('admin.buttonAdd') ?></button>
        <a href="{{route('admin.product.list.index')}}" class="btn btn-default"><?= trans('admin.buttonReset') ?></a>
        <form>
            </div>
            @endsection
            @section('footer')

            @endsection