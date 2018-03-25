<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $users_data = ['administrator', 'moderator', 'uzytkownik', 'kierownik'];

        foreach($users_data as $user_date) {
            $role = new \App\Role();
            $role->name = $user_date ;
            $role->save();
        }
    }
}
