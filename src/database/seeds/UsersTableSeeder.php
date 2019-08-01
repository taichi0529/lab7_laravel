<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => '中村太一',
            'email' => 'taichi@asaichi.co.jp',
            'password' => bcrypt('secret'),
        ]);


        $user = new User();
        $user->name = '中村太一2';
        $user->email = 'taichi2@asaichi.co.jp';
        $user->password = bcrypt('secret');
        $user->save();


    }
}
