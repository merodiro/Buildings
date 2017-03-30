<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.setting.index', compact('settings'));
    }

    public function store(Request $request)
    {
        foreach (array_except($request->toArray(), '_token') as $key => $req)
        {
            $setting = Setting::where('name', $key)->first();
            $setting->update(['value' => $req]);
        }

        return redirect('/admin/settings')->with('message', 'تم التعديل على الاعدادات بنجاح');

    }

}
