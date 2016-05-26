@extends('Admin.layout')
@section('header')
{{trans('contenthtml.edit')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('contenthtml.edit')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<!-- /.col-lg-12 -->
<div class="col-lg-12">
    <form action="{{route('admin.contenthtml.update',$item[0]['id'])}}" method="POST" class="form-horizontal" role="form">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('contenthtml.name')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" disabled="disabled" value="{{$item[0]['name']}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">{{trans('contenthtml.content')}}</label>
            <div class="col-sm-10">
                <textarea name="value" id="value"><?= $item[0]['value'] ?></textarea>
                <script>CKEDITOR.replace('value');</script>
            </div>
        </div>
        <button type="submit" class="btn btn-default"><?= trans('admin.buttonEdit') ?></button>
        <a href="{{route('admin.contenthtml.index')}}" class="btn btn-default"><?= trans('admin.buttonReset') ?></a>
    </form>
</div>
@endsection
@section('footer')

@endsection