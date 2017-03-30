@extends('admin.layouts.app')

@section('title')
    تعديل العضو
@endsection



@section('content')
    <section class="content-header">
        <h1>
            تعديل العضو
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="/admin/users">التحكم فى الأعضاء</a></li>
            <li class="active"><a href="/admin/users/{{ $user->id }}/edit">
                    تعديل العضو
                    {{ $user->name }}
                </a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل العضو</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($user, ['url'=>'admin/users/'.$user->id , 'method'=>'PATCH', 'class' => 'form-horizontal']) !!}
                            @include('admin.user.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
