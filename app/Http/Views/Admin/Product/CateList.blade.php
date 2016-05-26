@extends('Admin.layout')
@section('header')
{{trans('layoutadmin.productcate')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('layoutadmin.productcate')}}</h1>
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
                <th>{{trans('product.catename')}}</th>
                <th>{{trans('admin.alias')}}</th>
                <th>{{trans('admin.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menu as $item)
            <tr>
                <td>{{$item['name']}}</td>
                <td>{{$item['alias']}}</td>
                <td>
                    <a style="float:left;" class="label label-primary" href="{{route('admin.product.category.edit',$item['id'])}}"><?= trans('admin.buttonEdit') ?></a>
                    <form action="{{route('admin.product.category.destroy',$item['id'])}}" method="POST" style="float: left;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="id" value="{{$item['id']}}" />
                        <button onclick="return confirm('{{trans('product.confirmcatedelete')}}')" type="submit" class="label label-danger" href="{{route('admin.product.category.destroy',$item['id'])}}"><?= trans('admin.buttonDelete') ?></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a class="label label-primary" href="{{route('admin.product.category.create')}}"><?=  trans('admin.buttonAdd')?></a>
@endsection
@section('footer')

@endsection