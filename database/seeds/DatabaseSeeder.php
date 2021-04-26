<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * 產生 10 個使用者(user)，
         * 每個使用者有 20 篇貼文(post)，
         * 每篇貼文有 1 到 3 個留言(comment)
         **/
        factory(User::class, 10)->create()->each(function($user) {
            $posts = $user->posts()->createMany(
                factory(Post::class, 20)->make()->toArray()
            );

            $faker = \Faker\Factory::create();
            $posts->each(function($post) use($faker) {
                $post->comments()->createMany(
                    factory(Comment::class, $faker->numberBetween(1, 3))->make()->toArray()
                );
            });
        });
    }
}
