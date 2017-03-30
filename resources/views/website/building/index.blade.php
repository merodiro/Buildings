@extends('layouts.app')

@section('title')
    كل العقارات
@endsection

@section('header')
    {!! Html::style('website/css/all-buildings.css') !!}

@endsection

@section('content')
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar search-sidebar">
                    <div class="profile-usertitle">
                        البحث المتقدم
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        {{ Form::open(['url' => 'buildings/search', 'method' => 'get']) }}
                        <ul class="nav">
                            <li>
                                {!! Form::text("price_from", null, ['class' => 'form-control', 'placeholder' => 'سعر العقار من']) !!}
                            </li>
                            <li>
                                {!! Form::text("price_to", null, ['class' => 'form-control', 'placeholder' => 'سعر العقار إلى']) !!}
                            </li>
                            <li>
                                {!! Form::select("city",building_cities() , null, ['class' => 'form-control', 'placeholder' => 'محافظة العقار']) !!}
                            </li>
                            <li>
                                {!! Form::select("rooms", room_number(), null, ['class' => 'form-control', 'placeholder' => 'عدد الغرف']) !!}
                            </li>
                            <li>
                                {!! Form::select("type", building_type(), null, ['class' => 'form-control', 'placeholder' => 'نوع العقار']) !!}
                            </li>
                            <li>
                                {!! Form::select("rent", building_rent(), null, ['class' => 'form-control', 'placeholder' => 'نوع العملية']) !!}
                            </li>
                            <li>
                                {!! Form::text("area", null, ['class' => 'form-control', 'placeholder' => 'المساحة']) !!}
                            </li>
                            <li>
                                {!! Form::submit("بحث", ['class' => 'btn btn-success']) !!}
                            </li>
                        </ul>
                        {{ Form::close() }}
                    </div>
                    <!-- END MENU -->
                </div>
                <div class="profile-sidebar">
                    <div class="profile-usertitle">
                        خيارات العقارات
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="{{ url('/buildings') }}">
                                    <i class="glyphicon glyphicon-home"></i>
                                    كل العقارات
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/buildings/rent') }}">
                                    <i class="glyphicon glyphicon-user"></i>
                                    ايجار </a>
                            </li>
                            <li>
                                <a href="{{ url('/buildings/sell') }}">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    تمليك </a>
                            </li>
                            <br>
                            <li>
                                <a href="{{ url('/buildings/type/0') }}">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    الشقق </a>
                            </li>
                            <li>
                                <a href="{{ url('/buildings/type/1') }}">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    الفلل </a>
                            </li>
                            <li>
                                <a href="{{ url('/buildings/type/2') }}">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    شاليهات </a>
                            </li>

                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                @if(!empty($search))
                    @foreach($search as $key => $val)
                        <span class="label label-primary label-search">
                            {{ searchFields()[$key] }} :
                            @if($key == 'city')
                                {{ building_cities()[$val] }}
                            @elseif($key == 'type')
                                {{ building_type()[$val] }}
                            @elseif($key == 'rent')
                                {{ building_rent()[$val] }}
                            @else
                                {{ $val }}
                            @endif
                        </span>
                    @endforeach
                    <hr>
                @endif
                <div class="profile-content">

                    @if(count($buildings))

                        @foreach($buildings->chunk(3) as $items)

                            <div class="row">

                                @foreach($items as $building)
                                    <div class="col-md-4">
                                        <div class="productbox">
                                            <img src="http://lorempixel.com/460/250/" class="img-responsive">
                                            <div class="producttitle">{{ $building->name }}</div>
                                            <p class="text-justify disc">{{ str_limit($building->short_description, 65) }}</p>
                                            <div class="productprice">
                                                <span class="pull-right">
                                                    المساحة:
                                                    {{ $building->area }}
                                                </span>
                                                <span class="pull-left">
                                                    نوع العملية:
                                                    {{ building_rent()[$building->rent] }}
                                                </span>
                                                <div class="clearfix"></div>
                                                <div class="pull-right">
                                                    <a href="#" class="btn btn-primary btm-sm" role="button">
                                                        اظهر التفاصيل
                                                    </a>
                                                </div>
                                                <div class="pricetext">{{ $building->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        @endforeach
                    @else
                        <p class="text-center lead">لا توجد عقارات حالية</p>
                    @endif

                    <div class="text-center">
                        {{ $buildings->appends(Request::except('page'))->links() }}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
        </div>

@endsection
