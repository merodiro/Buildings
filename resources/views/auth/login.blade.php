@extends('layouts.app')

@section('title')
  صفحة تسجيل الدخول
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3 class="text-center">تسجيل الدخول</h3>
                <hr class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label    ">البريد الإلكترونى</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="ادخل البريد الإلكترونى">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">كلمة المرور</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="ادخل كلمة المرور">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرنى
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-warning">
                                تسجيل الدخول
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                هل نسيت كلمة المرور؟
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
