<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = now();

        DB::table('categories')->insert([
            'name' => 'General',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
    }
}
