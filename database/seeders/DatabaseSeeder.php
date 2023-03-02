<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SubscriberDetail;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Subset;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Subscriber::factory(10)->create();
        SubscriberDetail::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
