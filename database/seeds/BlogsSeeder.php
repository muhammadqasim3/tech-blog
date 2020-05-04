<?php

use Illuminate\Database\Seeder;
use App\Blog;
class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Blog::class, 100)->create()->each(function ($blog){
            $blog->save();
        });
    }
}
