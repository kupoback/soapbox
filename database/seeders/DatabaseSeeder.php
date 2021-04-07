<?php

namespace Database\Seeders;

use App\Models\ActionableItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Team;
use App\Models\Topic;
use App\Models\Comment;
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
        // $teams = Teams::factory(4)->create();
        // $teams->map(function($team) {
        //     Topics::factory(8)->create(['team_id' => $team->id]);
        // });
        
        // Generate Our Teams
        Team::factory(4)
            ->create()
            ->map(function ($team) {
                /**
                 * Using our Team, generate some topics for it, between 1 - 10 topics
                 */
                Topic::factory(rand(1,10))
                     ->create(['team_id' => $team->id])
                     ->map(function ($topic) {
                         /**
                          * Using our Topic, generate some comments for it between 1 - 20 comments
                          */
                         Comment::factory(rand(1, 20))
                                ->create(['topic_id' => $topic->id]);
                         /**
                          * Again using the Topic, generate some actionable items for out topic, between 1 and 10
                          */
                         ActionableItem::factory(rand(1, 10))
                                       ->create(['topic_id' => $topic->id]);
                     });
            });
        
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
