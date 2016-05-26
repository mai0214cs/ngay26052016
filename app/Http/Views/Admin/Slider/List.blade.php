@extends('Admin.layout')
@section('header')
{{trans('layoutadmin.slider')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('layoutadmin.slider')}}</h1>
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
                <th>{{trans('slider.name')}}</th>
                <th>{{trans('slider.image')}}</th>
                <th>{{trans('slider.link')}}</th>
                <th>{{trans('slider.order')}}</th>
                <th>{{trans('slider.status')}}</th>
                <th>{{trans('admin.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $key=>$slider)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$slider['name']}}</td>
                <td><img style="width:150px;" src="{{imageReset($slider['image'])}}" alt="{{$slider['name']}}" /></td>
                <td>{{$slider['link']}}</td>
                <td>{{$slider['orderby']}}</td>
                <td>{{$slider['status']}}</td>
                <td>
                    <a style="float:left;" class="label label-primary" href="{{route('admin.slider.edit',$slider['id'])}}"><?= trans('admin.buttonEdit') ?></a>
                    <form style="float:left;" action="{{route('admin.slider.destroy',$slider['id'])}}" method="POST">
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
<a class="label label-primary" href="{{route('admin.slider.create')}}"><?=  trans('admin.buttonAdd')?></a>
@endsection
@section('footer')

@endsection