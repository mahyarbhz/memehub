<?php

namespace Database\Seeders;

use App\Models\User;
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
//        User::factory()
//            ->count(20)
//            ->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
