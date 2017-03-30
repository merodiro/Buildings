@extends('admin.layouts.app')

@section('title')
    تعديل اعدادات الموقع
@endsection



@section('content')
    <section class="content-header">
        <h1>
            أضف عضو
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="/admin/settings">تعديل اعدادات الموقع</a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل اعدادات الموقع</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['url' => 'admin/settings', 'class' => 'form-horizontal', 'method' => 'post']) !!}

                        @foreach($settings as $setting)
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label($setting->name, $setting->slug, ['class' => 'col-md-4 control-label']) !!}

                                <div class="col-md-6">
                                    @if($setting->type == 0)
                                        {!! Form::text($setting->name, $setting->value , ['class' => 'form-control', 'placeholder' => $setting->name]) !!}
                                    @else
                                        {!! Form::textarea($setting->name, $setting->value , ['class' => 'form-control', 'placeholder' => $setting->name]) !!}
                                    @endif

                                    @if ($errors->has($setting->name))
                                        <span class="help-block">
                                                <strong>{{ $errors->first($setting->name) }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-save"></i>
                                    حفظ الاعدادات
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
