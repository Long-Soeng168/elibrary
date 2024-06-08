<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);

        // =============Seed Dummy Data================
        // \App\Models\Author::factory(10)->create();
        // \App\Models\Publisher::factory(10)->create();
        // \App\Models\PublicationType::factory(10)->create();
        // \App\Models\Language::factory(2)->create();
        // \App\Models\Location::factory(10)->create();
        // \App\Models\PublicationCategory::factory(10)->create();
        // \App\Models\PublicationSubCategory::factory(10)->create();
        \App\Models\Publication::factory(20)->create();


    }
}
