@extends('admin.layouts.app')

@section('title')
    اضف عضو
@endsection



@section('content')
    <section class="content-header">
      <h1>
أضف عضو
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="/admin/users">التحكم فى الأعضاء</a></li>
        <li class="active"><a href="/admin/users/create">أضف عضو</a></li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">أضف عضو جديد</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['url' => 'admin/users', 'class' => 'form-horizontal', 'method' => 'post']) !!}
                            @include('admin.user.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
