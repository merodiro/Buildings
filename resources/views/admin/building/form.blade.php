<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'اسم العقار', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('name',null , ['class' => 'form-control', 'placeholder' => 'ادخل اسم العقار', 'required' => 'required', 'autofocus' => 'true']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'سعر العقار', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('price', null , ['class' => 'form-control', 'placeholder' => 'ادخل سعر العقار', 'required' => 'required']) !!}

        @if ($errors->has('price'))
            <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

    {!! Form::label('image', 'صورة العقار', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        @if(isset($building) && $building->image)
            <img src="{{ Storage::url($building->image) }}" style="width: 100px">
            <div class="clearfix">  </div>
            <br>
        @endif
        {!! Form::file('image', null , ['class' => 'form-control', 'placeholder' => 'ادخل صورة العقار', 'required' => 'required']) !!}

        @if ($errors->has('image'))
            <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
    {!! Form::label('rooms', 'عدد الغرف', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('rooms', null , ['class' => 'form-control', 'placeholder' => 'ادخل عدد الغرف', 'required' => 'required']) !!}

        @if ($errors->has('rooms'))
            <span class="help-block">
                    <strong>{{ $errors->first('rooms') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
    {!! Form::label('rent', 'نوع العملية', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::select('rent', building_rent(), null , ['class' => 'form-control', 'required' => 'required']) !!}

        @if ($errors->has('rent'))
            <span class="help-block">
                    <strong>{{ $errors->first('rent') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
    {!! Form::label('area', 'مساحة العقار', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('area', null , ['class' => 'form-control', 'placeholder' => 'ادخل مساحة العقار', 'required' => 'required']) !!}

        @if ($errors->has('area'))
            <span class="help-block">
                    <strong>{{ $errors->first('area') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    {!! Form::label('type', 'نوع العقار', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::select('type', building_type(), null , ['class' => 'form-control', 'required' => 'required']) !!}

        @if ($errors->has('type'))
            <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    {!! Form::label('status', 'حالة العقار', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::checkbox('status', null) !!}

        @if ($errors->has('status'))
            <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('meta') ? ' has-error' : '' }}">
    {!! Form::label('meta', 'الكلمات الدلالية', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('meta', null , ['class' => 'form-control', 'placeholder' => 'ادخل الكلمات الدلالية', 'required' => 'required']) !!}

        @if ($errors->has('meta'))
            <span class="help-block">
                    <strong>{{ $errors->first('meta') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    {!! Form::label('city', 'المحافظة', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::select('city',building_cities() , null , ['class' => 'form-control', 'placeholder' => 'ادخل المحافظة', 'required' => 'required']) !!}

        @if ($errors->has('city'))
            <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
    {!! Form::label('short_description', 'وصف العقار لمحركات البحث', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::textarea('short_description', null , ['rows' => 4, 'class' => 'form-control', 'placeholder' => 'ادخل وصف العقار لمحركات البحث', 'required' => 'required']) !!}

        <span class="help-block">لا يمكن ادخال اكثر من 160 حرف</span>

        @if ($errors->has('short_description'))
            <span class="help-block">
                    <strong>{{ $errors->first('short_description') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
    {!! Form::label('longitude', 'خط الطول', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('longitude', null , ['class' => 'form-control', 'placeholder' => 'ادخل خط الطول', 'required' => 'required']) !!}

        @if ($errors->has('longitude'))
            <span class="help-block">
                    <strong>{{ $errors->first('longitude') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
    {!! Form::label('latitude', 'دائرة العرض', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('latitude', null , ['class' => 'form-control', 'placeholder' => 'ادخل دائرة العرض', 'required' => 'required']) !!}

        @if ($errors->has('latitude'))
            <span class="help-block">
                    <strong>{{ $errors->first('latitude') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('full_description') ? ' has-error' : '' }}">
    {!! Form::label('full_description', 'وصف مطول للعقار', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::textarea('full_description', null , ['rows' => 4, 'class' => 'form-control', 'placeholder' => 'ادخل وصف مطول للعقار', 'required' => 'required']) !!}

        @if ($errors->has('full_description'))
            <span class="help-block">
                    <strong>{{ $errors->first('full_description') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-warning">
            @if(isset($building))
                تعديل
            @else
                انشاء
            @endif
        </button>
    </div>
</div>
{{--</form>--}}
