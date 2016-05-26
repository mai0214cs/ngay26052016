@extends('Admin.layout')
@section('header')
{{trans('menu.menutype')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('menu.menutype')}}</h1>
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
                <th>{{trans('menu.catename')}}</th>
                <th>{{trans('admin.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item['name']}}</td>
                <td>
                    <a style="float:left;" class="label label-primary" href="{{route('admin.menu.show',$item['id'])}}"><?= trans('admin.buttonEdit') ?></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('footer')

@endsection