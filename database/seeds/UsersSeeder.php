<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        $user->save();


        $user = new User();
        $user->name = 'user';
        $user->email = 'user@user.com';
        $user->password = bcrypt('user');
        $user->save();

        $user = new User();
        $user->name = 'login';
        $user->email = 'login@login.com';
        $user->password = bcrypt('login');
        $user->save();



    }
}
