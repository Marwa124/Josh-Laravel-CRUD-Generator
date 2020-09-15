<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::truncate();
        Blog::truncate();
        $faker = Faker\Factory::create();

        //create blog categories
        for ($i = 0; $i < 5; $i++) {
            BlogCategory::create([
                'title' => $faker->word(1, true),
            ]);
        }

        //create blogs
        for ($i = 0; $i < 5; $i++) {
            Blog::create([
                'blog_category_id'  => rand(1, 5),
                'user_id'   => 1,
                'title' => $faker->sentence(6),
                'content'   => $faker->text(500),
                'image' => $faker->image('public/uploads/blog/', 640, 480, null, false),
            ]);
        }
    }
}
