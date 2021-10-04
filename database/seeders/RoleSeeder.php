<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = now();

        DB::table('roles')->insert([
            'name' => 'Member',
            'scope' => 'member',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
        DB::table('roles')->insert([
            'name' => 'Chieftain',
            'scope' => 'owner',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
    }
}
