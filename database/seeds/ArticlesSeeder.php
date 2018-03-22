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

        for($i=0; $i<200; $i++) {
            $article = new \App\Article();
            $article->title = $faker->title();
            $article->body = $faker->sentence(30);
            $article->category_id = $faker->numberBetween(1,200);
            $article->save();
        }
    }
}
