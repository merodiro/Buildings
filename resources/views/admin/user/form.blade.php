<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'الأسم', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('name',null , ['class' => 'form-control', 'placeholder' => 'ادخل الاسم', 'required' => 'required', 'autofocus' => 'true']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'البريد الإلكترونى', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::email('email', null , ['class' => 'form-control', 'placeholder' => 'ادخل البريد الإلكترونى', 'required' => 'required']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'كلمة المرور', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'ادخل كلمة المرور']) !!}

        @if ($errors->has('password'))
            <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('admin', 'الصلاحيات', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        @if(!isset($user) || $user->id != 1)
            {!! Form::select('admin', ['0' => 'user', '1' => 'admin'] , null, ['class' => 'form-control']) !!}
        @else
            <p class="form-control-static">admin</p>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-warning">
            @if(isset($user))
                تعديل
            @else
                انشاء
            @endif
        </button>
    </div>
</div>
