<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Teams::factory(1)->create();
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(1)->create(
            [
                'name' => 'Luke Skywalker',
                'email' => 'jstamm@example.net',
                'email_verified_at' => now(),
                'role_id' => 1,
                'password' => Hash::make('dev')
            ]
        );
    }
}
