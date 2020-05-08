<?php

use App\User;
use App\Partner;
use App\Join;
use App\Comment;
use App\Reply;
use App\Gallery;
use App\Category;
use App\Notification;
use Faker\Factory as Faker;
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
        $faker = Faker::create('id_ID');

        $arr_category = ['Gunung', 'Pantai', 'Air Terjun', 'Road Trip'];
        for ($i = 1; $i <= count($arr_category); $i++) {
            DB::table('category')->insert([
                'id' => $i,
                'name' => $arr_category[($i - 1)],
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

        //* ------------------------------ For Testing ------------------------------------ *//

        factory(User::class, 25)->create();
        factory(Gallery::class, 100)->create();
        $users = User::pluck('id')->toArray();
        $category = Category::pluck('name')->toArray();

        for ($i = 1; $i <= 100; $i++) {
            $count_category = $faker->numberBetween(1, 3);
            $categories = "";
            for ($j = 0; $j < $count_category; $j++) {
                $categories .= $faker->randomElement($category) . ",";
            }
            $start_date = $faker->dateTimeBetween('2020-06-01', '2021-01-01')->format('Y-m-d');
            $end_date = $faker->dateTimeBetween($start_date, '2021-01-01')->format('Y-m-d');

            $user_id = $faker->randomElement($users);

            DB::table('partner')->insert([
                'id' => $i,
                'user_id' => $user_id,
                'dest_name' => $faker->city,
                'dest_location' => $faker->address,
                'dest_picture' => 'https://picsum.photos/seed/' . $faker->word . '/800/600',
                'start_date' => $start_date,
                'end_date' => $end_date,
                'gather_time' => now(),
                'gather_point' => $faker->address,
                'required_person' => $faker->numberBetween(5, 20),
                'categories' => $categories,
                'description' => $faker->text(200),
                'status' => $faker->numberBetween(-1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('join')->insert([
                'id' => $i,
                'user_id' => $user_id,
                'partner_id' => $i,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        //* ------------------------------------------------------------------------------ *//
    }
}
