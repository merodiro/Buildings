@extends('admin.layouts.app')

@section('title')
    تعديل العقار
@endsection

@section('head')
    {!! Html::style('admin-assets/plugins/iCheck/all.css') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            تعديل العقار
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="/admin/buildings">التحكم فى العقارات</a></li>
            <li class="active"><a href="/admin/{{ $building->id }}/edit">
                    تعديل العقار
                    {{ $building->name }}
                </a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل العقار</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($building, ['url'=>'admin/buildings/'.$building->id , 'method'=>'PATCH', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @include('admin.building.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    {!! Html::script('admin-assets/plugins/iCheck/icheck.min.js') !!}
    <script>
        $(document).ready(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-red',
                radioClass: 'iradio_square-red',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection