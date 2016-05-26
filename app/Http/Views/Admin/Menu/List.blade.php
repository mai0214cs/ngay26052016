@extends('Admin.layout')
@section('header')
{{trans('menu.menudetail')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('menu.menudetail')}}</h1>
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
                <th>{{trans('menu.name')}}</th>
                <th>{{trans('menu.icon')}}</th>
                <th>{{trans('menu.link')}}</th>
                <th>{{trans('menu.target')}}</th>
                <th>{{trans('menu.status')}}</th>
                <th>{{trans('admin.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['image']}}</td>
                <td>{{$item['link']}}</td>
                <td>{{$item['target']}}</td>
                <td>{{$item['status']}}</td>
                <td>
                    <a style="float:left;" class="label label-primary" href="{{route('admin.menu.edit',$item['id'])}}"><?= trans('admin.buttonEdit') ?></a>
                    <form style="float:left;" action="{{route('admin.menu.destroy',$item['id'])}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button  class="label label-danger" type="submit"><?= trans('admin.buttonDelete') ?></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<a class="label label-primary" href="{{route('admin.menu.create','id='.$idType)}}"><?=  trans('admin.buttonAdd')?></a>
@endsection
@section('footer')

@endsection