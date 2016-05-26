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
                <th>{{trans('support.fullname')}}</th>
                <th>{{trans('support.avatar')}}</th>
                <th>{{trans('support.information')}}</th>
                <th>{{trans('support.orderby')}}</th>
                <th>{{trans('support.status')}}</th>
                <th>{{trans('admin.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supports as $key=>$support)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$support['fullname']}}</td>
                <td><img style="width: 75px;" src="{{imageReset($support['avatar'])}}" alt="{{$support['avatar']}}" /></td>
                <td>
                    <span data-toggle="tooltip" class="label label-primary" title="{{$support['yahoo']}}">{{trans('support.yahoo')}}</span>&nbsp;
                    <span data-toggle="tooltip" class="label label-primary" title="{{$support['skype']}}">{{trans('support.skype')}}</span>&nbsp;
                    <span data-toggle="tooltip" class="label label-primary" title="{{$support['facebook']}}">{{trans('support.facebook')}}</span>&nbsp;
                    <span data-toggle="tooltip" class="label label-primary" title="{{$support['address']}}">{{trans('support.address')}}</span>&nbsp;
                    <span data-toggle="tooltip" class="label label-primary" title="{{$support['website']}}">{{trans('support.website')}}</span>
                </td>
                <td>{{$support['orderby']}}</td>
                <td>{{$support['status']}}</td>
                <td>
                    <a style="float:left;" class="label label-primary" href="{{route('admin.support.edit',$support['id'])}}"><?= trans('admin.buttonEdit') ?></a>
                    <form style="float:left;" action="{{route('admin.support.destroy',$support['id'])}}" method="POST">
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
<a class="label label-primary" href="{{route('admin.support.create')}}"><?=  trans('admin.buttonAdd')?></a>
@endsection
@section('footer')
<script>
$('[data-toggle="tooltip"]').tooltip();
</script>
@endsection