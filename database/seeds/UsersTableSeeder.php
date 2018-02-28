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
        $user_one->email = 'test@test.test';
        $user_one->password = bcrypt('sdfsdf');
        $user_one->save();
    }
}
