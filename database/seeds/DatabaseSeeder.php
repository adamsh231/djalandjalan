<?php

use App\User;
use App\Partner;
use App\Join;
use App\Comment;
use App\Reply;
use App\Gallery;
use App\Notification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 25)->create();
        factory(Partner::class, 12)->create();
        factory(Join::class, 60)->create();
        factory(Comment::class, 200)->create();
        factory(Reply::class, 300)->create();
        factory(Gallery::class, 50)->create();
        factory(Notification::class, 70)->create();
    }
}
