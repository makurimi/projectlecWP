<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('user')->insert([
            'name' => 'Novan Nur Bhakti',
            'email' => 'Novan@gmail.com',
            'password' => bcrypt('novan123'),
            'level' => 'admin'
        ]);
        DB::table('user')->insert([
            'name' => 'Novan Bhakti',
            'email' => 'Novanbhakti@gmail.com',
            'password' => bcrypt('novan123'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Asus',
            'images' => 'Asus.png'
        ]);

        DB::table('categories')->insert([
            'name' => 'Legion',
            'images' => 'Legion.png'
        ]);
        DB::table('categories')->insert([
            'name' => 'Omen',
            'images' => 'omen.png'
        ]);
        DB::table('categories')->insert([
            'name' => 'Predator',
            'images' => 'predator.png'
        ]);
    }
}
