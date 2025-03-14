<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if the admin user already exists
        $user = User::where('email', 'admin@example.com')->first();

        if (!$user) {
            // If not, create the admin user
            $user = User::create([
                'username'   => 'Admin',
                'email'      => 'admin@example.com',
                'password'   => bcrypt('password123'),
                'is_admin'   => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Optionally, you can uncomment this to seed additional users with a factory
        // User::factory(10)->create();
    }
}
