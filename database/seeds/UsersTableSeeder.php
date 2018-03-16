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
        $user_one = new User();
        $user_one->role_id = 1;
        $user_one->name = 'Max F';
        $user_one->about = 'Hi, my name is Max';
        $user_one->username = 'mf237';
        $user_one->url = '/mf237';
        $user_one->website = 'www.usa.gov';
        $user_one->facebook = 'www.facebook.com';
        $user_one->twitter = 'www.twitter.com';
        $user_one->instagram = 'www.instagram.com';
        $user_one->email = 'test@test.test';
        $user_one->password = bcrypt('sdfsdf');
        $user_one->save();
    }
}
