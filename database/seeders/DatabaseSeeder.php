<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(10)->create();
        Category::factory(12)->create();
        SubCategory::factory(20)->create();
        Item::factory(120)->create();

        User::create([
            'name' => 'Yahya Admin',
            'email' => 'yahya@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('yahyayahya'), // password
            'remember_token' => Str::random(10),
            'is_admin' => 1
        ]);
    }
}
