<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pl_PL');

        for($i=0; $i<100; $i++) {
            $category = new \App\Article();
            $category->title = $faker->title();
            $category->body = $faker->sentence(30);
            $category->save();
        }
    }
}
