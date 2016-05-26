@extends('Admin.layout')
@section('header')
{{trans('support.add')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('support.add')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<!-- /.col-lg-12 -->
<div class="col-lg-12">
    <form action="{{route('admin.support.store')}}" method="POST" class="form-horizontal" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.fullname')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="fullname" value="{{old('fullname')}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.avatar')}}</label>
            <div class="col-sm-10">
                <div class="imageavatar">
                    <img style="width: 75px;" src="{{imageReset(old('avatar'))}}" alt="Avatar" />
                </div>
                <input type="hidden" class="form-control" name="avatar" id="avatar" value="{{imageReset(old('avatar'))}}" />
                <input onclick="selectFileWithCKFinder('avatar')" type="button" value="Chọn hình ảnh">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.description')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" value="{{old('description')}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.yahoo')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="yahoo" value="{{old('yahoo')}}" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.skype')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="skype" value="{{old('skype')}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.facebook')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="facebook" value="{{old('facebook')}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.address')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address" value="{{old('address')}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.website')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="website" value="{{old('website')}}" />
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.orderby')}}</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="orderby" value="{{old('orderby')==''?999:old('orderby')}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('support.status')}}</label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input name="status" value="Y" {{in_array(old('status'), array('Y',''))?'checked="checked"':''}} type="radio">{{trans('admin.show')}}
                </label>
                <label class="radio-inline">
                    <input name="status" value="N" {{old('status')=='N'?'checked="checked"':''}} type="radio">{{trans('admin.hide')}}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-default"><?= trans('admin.buttonAdd') ?></button>
        <a href="{{route('admin.support.index')}}" class="btn btn-default"><?= trans('admin.buttonReset') ?></a>
    </form>
</div>
@endsection
@section('footer')

@endsection