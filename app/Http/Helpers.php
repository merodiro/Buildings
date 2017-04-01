<?php

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

function getSetting($setting = 'sitename')
{
    return Setting::where('name', $setting)->first()->value;
}

function building_type()
{
    return [
        'شقة',
        'فيلا',
        'شاليه'
    ];
}

function building_rent()
{
    return [
        'تمليك',
        'ايجار',
    ];
}

function building_status()
{
    return [
        'غير مفعل',
        'مفعل',
    ];
}

function room_number()
{
    $arr = Cache::remember('rooms', 60, function () {
       return DB::table('buildings')->select('rooms')->orderBy('rooms')->distinct()->pluck('rooms')->toArray();
    });
    $arr = array_combine($arr, $arr);
    return $arr;
}

function building_cities()
{
    return [
        'القاهرة',
        'الجيزة',
        'الاسكندرية',
        'الدقهلية',
        'البحر الاحمر',
        'البحيرة',
        'الفيوم',
        'الغربية',
        'الاسماعلية',
        'المنوفية',
        'المنيا',
        'القليوبية',
        'الوادى الجديد',
        'الشرقية',
        'السويس',
        'اسوان',
        'اسيوط',
        'بنى سويف',
        'بور سعيد',
        'دمياط',
        'جنوب سيناء',
        'كفر الشيخ',
        'مطروح',
        'قنا',
        'شمال سيناء',
        'سوهاج',
    ];
}

function searchFields()
{
    return [
        'price' => 'سعر العقار',
        'price_from' => 'سعر العقار من',
        'price_to' => 'سعر العقار إلى',
        'city' => 'محافظة العقار',
        'rooms' => 'عدد الغرف',
        'type' => 'نوع العقار',
        'rent' => 'نوع العملية',
        'area' => 'المساحة'
    ];
}

function checkIfImageExists ($image) {
    if ($image)
    {
        return Storage::url($image);
    } else {
        return config('settings.noimage');
    }


}