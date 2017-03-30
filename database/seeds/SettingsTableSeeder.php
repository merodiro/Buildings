<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
                [
                'slug' => 'اسم الموقع',
                'name' => 'sitename',
                'value' => 'موقع عقارات',
                'type' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                'slug' => 'الموبايل',
                'name' => 'mobile',
                'value' => '0154545424548',
                'type' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                'slug' => 'فيس بوك',
                'name' => 'facebook',
                'value' => 'فيس بوك',
                'type' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                'slug' => 'تويتر',
                'name' => 'twitter',
                'value' => 'تويتر',
                'type' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                'slug' => 'يوتيوب',
                'name' => 'youtube',
                'value' => 'يوتيوب',
                'type' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                'slug' => 'العنوان',
                'name' => 'address',
                'value' => 'مصر',
                'type' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                'slug' => 'الكلمات الدلالية',
                'name' => 'keywords',
                'value' => 'عقارات بيع شراء',
                'type' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],[
                'slug' => 'وصف الموقع',
                'name' => 'description',
                'value' => 'موقع عقارات',
                'type' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ]);
    }
}
