@extends('Admin.layout')
@section('header')
{{trans('layoutadmin.newslist')}}
@endsection
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">{{trans('layoutadmin.newslist')}}</h1>
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
                <th>{{trans('news.listname')}}</th>
                <th>{{trans('news.listavatar')}}</th>
                <th>{{trans('news.listparent')}}</th>
                <th>{{trans('admin.alias')}}</th>
                <th>{{trans('news.new')}}</th>
                <th>{{trans('news.hot')}}</th>
                <th>{{trans('news.feature')}}</th>
                <th>{{trans('news.DateAdd')}}</th>
                <th>{{trans('news.DateEdit')}}</th>
                <th>{{trans('news.View')}}</th>
                 <th>{{trans('news.liststatus')}}</th>
                <th>{{trans('admin.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $item)
            <tr>
                <td>{{$item['name']}}</td>
                <td><img src="{{imageReset($item['avatar'])}}" alt="{{$item['name']}}" class="imageAvatar" /></td>
                <td>{{isset($cate[$item['category_id']])?$cate[$item['category_id']]:''}}</td>
                <td>{{$item['alias']}}</td>
                <td>{{$item['new']}}</td>
                <td>{{$item['hot']}}</td>
                <td>{{$item['feature']}}</td>
                <td>{{$item['created_at']}}</td>
                <td>{{$item['updated_at']}}</td>
                <td>{{$item['viewcount']}}</td>
                <td>{{$item['status']}}</td>
                <td>
                    <a style="float:left;" class="label label-primary" href="{{route('admin.news.list.edit',$item['id'])}}"><?= trans('admin.buttonEdit') ?></a>
                    <form action="{{route('admin.news.list.destroy',$item['id'])}}" method="POST" style="float: left;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="id" value="{{$item['id']}}" />
                        <button onclick="return confirm('{{trans('news.confirmcatedelete')}}')" type="submit" class="label label-danger" href="{{route('admin.news.list.destroy',$item['id'])}}"><?= trans('admin.buttonDelete') ?></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a class="label label-primary" href="{{route('admin.news.list.create')}}"><?=  trans('admin.buttonAdd')?></a>
@endsection
@section('footer')

@endsection