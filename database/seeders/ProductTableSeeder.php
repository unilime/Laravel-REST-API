<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Product::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few Products in our database:
        for ($i = 0; $i < 120; $i++) {
            $date = $faker->dateTimeThisMonth();
            Product::create([
                'title' => $faker->word,
                'body' => $faker->paragraph,
                'price' => $faker->numberBetween(1000, 20000),
                'thumbnail' => url('/assets/image.jpg'),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
