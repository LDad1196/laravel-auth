<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\Languages;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $url = 'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg';
        for ($i = 0; $i < 12; $i++) {
            $post = new Post();
            $post->project_title = $faker->name;
            $post->description = $faker->text;
            $post->collaborators = $faker->name;
            $post->framework = $faker->name;
            $post->thumb = $faker->imageUrl(600, 400, 'projects', true, gray: true, format: 'jpg');
            $post->start_project = $faker->date();
            $post->end_project = $faker->date();
            $post->type_id = $faker->numberBetween(1, 4);
            
            $post->save();

            
           //$post->language()->attach(2);
        }
    }
}
