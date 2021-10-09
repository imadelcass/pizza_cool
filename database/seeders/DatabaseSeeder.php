<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\pizza;
use App\Models\User;
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
        // User::factory(10)->create();
        pizza::factory(10)->create();

        Category::create([
            'name' => 'breakfast',
            'img' => '1631787299.png',
        ]);
        Category::create([
                'name' => 'lunch',
                'img' => '1631803676.png',
            ]
        );
        Category::create(
            [
                'name' => 'dinner',
                'img' => '1631803757.png',
            ]
        );
    }
}
