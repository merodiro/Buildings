<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'مدير',
            'email' => 'admin@admin.com',
            'password'=> 'secret',
            'admin' => 1
        ]);

        factory(App\User::class, 10)->create();
    }
}
