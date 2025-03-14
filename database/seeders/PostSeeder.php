<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Check if the admin user exists
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
        } else {
            // If the user exists, update to ensure is_admin is true
            $user->update([
                'is_admin'   => true,
                'updated_at' => now(),
            ]);
        }

        // Create sample posts with image fields
        Post::create([
            'title'      => 'First Post',
            'image'      => 'images/Memevibe_logo.jpg', // Update with the correct path or URL
            'user_id'    => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Post::create([
            'title'      => 'Second Post',
            'image'      => 'images/Memevibe_logo.jpg', // Update with the correct path or URL
            'user_id'    => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Post::create([
            'title'      => 'Third Post',
            'image'      => 'images/Memevibe_logo.jpg', // Update with the correct path or URL
            'user_id'    => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
