<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [];
        foreach (range('A', 'H') as $category) {
            $categories[] = ['name' => $category];
        }

        Category::insert($categories);
    }
}
