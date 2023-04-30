<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\Size;
use App\Models\SizeDress;
use App\Models\Status;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        Category::create([
            'title' => 'Shirt',
            'slug' => 'shirt'
        ]);

        Category::create([
            'title' => 'Jeans',
            'slug' => 'jeans'
        ]);


        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'user'
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
            'profile' => 'profile.jpg'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make("user"),
            'role_id' => 2,
            'profile' => 'profile.jpg'
        ]);

        Status::create([
            'name' => 'Diproses'
        ]);
        Status::create([
            'name' => 'Sedang Dikirim'
        ]);
        Status::create([
            'name' => 'Selesai'
        ]);



    }
}

