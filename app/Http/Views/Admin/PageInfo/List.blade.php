@extends('Admin.layout')
@section('header')
{{trans('layoutadmin.pageinfo')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('layoutadmin.pageinfo')}}</h1>
</div>
<div class="clearfix"></div>
@if(count($errors->all())>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<!-- /.col-lg-12 -->
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>{{trans('admin.order')}}</th>
                <th>{{trans('pageinfo.name')}}</th>
                <th>{{trans('admin.alias')}}</th>
                <th>{{trans('pageinfo.seotitle')}}</th>
                <th>{{trans('pageinfo.seodescription')}}</th>
                <th>{{trans('pageinfo.seokeywords')}}</th>
                <th>{{trans('pageinfo.status')}}</th>
                <th>{{trans('admin.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lists as $key=>$item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['alias']}}</td>
                <td>{{$item['seotitle']}}</td>
                <td>{{$item['seodescription']}}</td>
                <td>{{$item['seokeywords']}}</td>
                <td>{{$item['status']}}</td>
                <td>
                    <a style="float:left;" class="label label-primary" href="{{route('admin.pageinfo.edit',$item['id'])}}"><?= trans('admin.buttonDetail') ?></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('footer')

@endsection