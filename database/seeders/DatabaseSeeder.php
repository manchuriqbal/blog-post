<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\PostView;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (env('APP_ENV') == 'local') {

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            User::truncate();
            Category::truncate();
            Tag::truncate();
            Post::truncate();
            PostView::truncate();
            Comment::truncate();
            Role::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');


            $this->call([
                RoleSeeder::class,
            ]);
            User::factory()->create([
                'username' => 'Admin',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'phone' => '01825921212',
                'avatar' => 'https://via.placeholder.com/150',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => static::$password ??= Hash::make('password'),
                'remember_token' => Str::random(10),
                'role_id' => 1, // Assuming '1' is the ID of the admin role
            ]);

            User::factory()->count(10)->create();
            Category::factory()->count(15)->create();
            Tag::factory()->count(40)->create();
            Post::factory()->count(50)->create();
            PostView::factory()->count(500)->create();
            Comment::factory()->count(20)->create();

        }
        else{
            User::factory()->create([
                'username' => 'Admin',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'phone' => '01825921212',
                'avatar' => 'https://via.placeholder.com/150',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => static::$password ??= Hash::make('password'),
                'remember_token' => Str::random(10),
                'role_id' => 1, // Assuming '1' is the ID of the admin role
            ]);

        }

    }
}
