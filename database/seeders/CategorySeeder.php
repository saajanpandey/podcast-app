<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $category1 = Category::where('id', 1)->first();
        if (!isset($category1)) {
            Category::create([
                'id' => 1,
                'title' => 'Politics',
            ]);
        }
        $category2 = Category::where('id', 2)->first();
        if (!isset($category2)) {
            Category::create([
                'id' => 2,
                'title' => 'Entertainment',
            ]);
        }
        $category3 = Category::where('id', 3)->first();
        if (!isset($category3)) {
            Category::create([
                'id' => 3,
                'title' => 'Sports',
            ]);
        }
        $category4 = Category::where('id', 4)->first();
        if (!isset($category4)) {
            Category::create([
                'id' => 4,
                'title' => 'E-Sports',
            ]);
        }
    }
}
