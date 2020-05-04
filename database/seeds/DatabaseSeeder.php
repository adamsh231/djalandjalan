<?php

use App\User;
use App\Partner;
use App\Join;
use App\Comment;
use App\Reply;
use App\Gallery;
use App\Notification;
use App\Category;
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
        $arr_category = ['Gunung', 'Pantai', 'Air Terjun', 'Road Trip'];
        for ($i = 1; $i <= count($arr_category); $i++) {
            DB::table('category')->insert([
                'id' => $i,
                'name' => $arr_category[($i-1)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        DB::table('user')->insert([
            'name' => 'Aldimagus Naridam',
            'email' => 'coba@gmail.com',
            'password' => bcrypt('cobacoba'),
            'phone' => '082140320491',
            'picture' => 'https://robohash.org/coba@gmail.com?set=set3',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        factory(User::class, 25)->create();
        factory(Partner::class, 12)->create();
        factory(Join::class, 60)->create();
        factory(Comment::class, 200)->create();
        factory(Reply::class, 300)->create();
        factory(Gallery::class, 50)->create();
        factory(Notification::class, 70)->create();
    }
}
