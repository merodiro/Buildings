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
            @include('website.building.sidebar')
            <div class="col-md-9">
                @if(!empty($search))
                    @foreach($search as $key => $val)
                        <span class="label label-primary label-search">
                            <a href="{{ url('buildings/search?' . $key . '=' . $val) }}">
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
                            </a>
                        </span>
                    @endforeach
                    <hr>
                @endif
                <div class="profile-content">

                    @include('website.building.buildings')

                    <div class="text-center">
                        {{ $buildings->appends(Request::except('page'))->links() }}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
        </div>
    </div>
@endsection
