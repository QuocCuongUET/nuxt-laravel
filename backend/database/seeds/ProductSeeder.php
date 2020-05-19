<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $categories = Category::all();
        $products = [];

        $faker = \Faker\Factory::create();

        foreach ($categories as $category) {
            foreach (range(0, 20) as $number) {
                $products[] = [
                    'name' => $faker->name,
                    'description' => $faker->text,
                    'price' => $faker->randomFloat(null, 0, 100),
                    'category_id' => $category->id
                ];
            }
        }

        Product::insert($products);
    }
}
