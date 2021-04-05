<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Teams;
use App\Models\Topics;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $topics = Topics::factory(8)->create();
        // collect($topics)->map(function($topic) {
        //     Teams::factory(1)->create(['topic_id' => 0]);
        // });
        // \App\Models\User::factory(10)->create();
        // User::factory(1)->create(
        //     [
        //         'name' => 'Luke Skywalker',
        //         'email' => 'jstamm@example.net',
        //         'email_verified_at' => now(),
        //         'role_id' => 1,
        //         'password' => Hash::make('dev')
        //     ]
        // );
    }
}
