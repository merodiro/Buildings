@if(count($buildings))

    @foreach($buildings->chunk(3) as $items)

        <div class="row">

            @foreach($items as $building)
                <div class="col-md-4">
                    <div class="productbox">
                        <img src="{{ checkIfImageExists($building->image) }}" class="img-responsive">
                        <div class="producttitle">{{ $building->name }}</div>
                        <p class="text-justify disc">{{ str_limit($building->short_description, 65) }}</p>
                        <div class="productprice">
                            <span class="pull-left">
                                                    المساحة:
                                {{ $building->area }}
                            </span>
                            <span class="pull-right">
                                                    نوع العملية:
                                {{ building_rent()[$building->rent] }}
                            </span>
                            <div class="clearfix"></div>
                            <span class="pull-left">
                                                    نوع العقار:
                                {{ building_type()[$building->type] }}
                            </span>
                            <span class="pull-right">
                                                    المحافظة:
                                {{ building_cities()[$building->city] }}
                            </span>
                            <div class="clearfix"></div>
                            <div class="pull-right">
                                <a href="{{ url('/buildings/' . $building->id) }}"
                                   class="btn btn-primary btm-sm" role="button">
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