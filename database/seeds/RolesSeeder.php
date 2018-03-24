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
        $faker = \Faker\Factory::create('pl_PL');

        for($i=0; $i<30; $i++) {
            $role = new \App\Role();
            $role->name = $faker->firstNameFemale;
            $role->save();
        }
    }
}
