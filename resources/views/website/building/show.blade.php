@extends('layouts.app')

@section('title')
    العقار
    {{ $building->name }}
@endsection

@section('header')
    {!! Html::style('website/css/all-buildings.css') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row profile">
            @include('website.building.sidebar')
            <div class="col-md-9">
                <div class="profile-content">
                    <h1>
                        {{ $building->name }}
                    </h1>
                    <hr>
                    <div class="btn-group">
                        <a href="{{ url('/buildings/search?price=' . $building->price) }}" class="btn btn-default">
                            السعر:
                            {{ $building->price }}
                        </a>
                        <a href="{{ url('/buildings/search?area=' . $building->area) }}" class="btn btn-default">
                            المساحة:
                            {{ $building->area }}
                        </a>
                        <a href="{{ url('/buildings/search?city=' . $building->city) }}" class="btn btn-default">
                            المحافظة:
                            {{ building_cities()[$building->city] }}
                        </a>
                        <a href="{{ url('/buildings/search?rooms=' . $building->rooms) }}" class="btn btn-default">
                            عدد الغرف:
                            {{ $building->rooms }}
                        </a>
                        <a href="{{ url('/buildings/search?type=' . $building->type) }}" class="btn btn-default">
                            نوع العقار:
                            {{ building_type()[$building->type] }}
                        </a>
                        <a href="{{ url('/buildings/search?rent=' . $building->rent) }}" class="btn btn-default">
                            نوع العملية:
                            {{ building_rent()[$building->rent] }}
                        </a>
                    </div>

                    <hr>
                    <p>
                        {!!  nl2br($building->full_description) !!}
                    </p>
                    <br>
                    <div id="map" style="width:100%;height:500px"></div>
                </div>
                <br>
                <div class="profile-content">
                    <h3>
                        عقارات اخرى قد تهمك
                    </h3>
                    <hr>
                    @include('website.building.buildings', ['buildings' => $similar_rent])
                    @include('website.building.buildings', ['buildings' => $similar_type])
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

@endsection

@section('footer')

    <script>
        function myMap() {
            var mapCanvas = document.getElementById("map");
            var myCenter = new google.maps.LatLng({{ $building->latitude }}, {{ $building->longitude }});
//            var myCenter = new google.maps.LatLng(0, 0);
            var mapOptions = {center: myCenter, zoom: 5};
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASDqTddvbz_b862tMw7kv-bFxQKuUe_gg&callback=myMap"></script>
@endsection