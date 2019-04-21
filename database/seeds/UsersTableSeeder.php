<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'name' => 'winni',
                'email' => 'adams4lyf@gmail.com',
                'password' => bcrypt('secret')
            ]
        );
    }
}
