<?php

use App\User;
use App\Partner;
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
        factory(Partner::class, 50)->create();
    }
}
