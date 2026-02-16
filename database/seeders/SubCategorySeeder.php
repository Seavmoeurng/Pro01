<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcatrogies = [
            ['name' => 'Fiction', 'category_id' => 1, 'user_id' => '1'], // subcateogry_id=1, category_id =1
            ['name' => 'History', 'category_id' => 1, 'user_id' => '1'], // subcateogry_id=2, category_id =1
            ['name' => 'Math', 'category_id' => 1, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Achelogy', 'category_id' => 1, 'user_id' => '1'], // subcateogry_id=1, category_id =1
            ['name' => 'Khmer Food', 'category_id' => 2, 'user_id' => '1'], // subcateogry_id=2, category_id =1
            ['name' => 'Fast Food', 'category_id' => 2, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Diet Food', 'category_id' => 2, 'user_id' => '1'], // subcateogry_id=1, category_id =1
            ['name' => 'Documentaery', 'category_id' => 3, 'user_id' => '1'], // subcateogry_id=2, category_id =1
            ['name' => 'Science Fiction', 'category_id' => 3, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Romance', 'category_id' => 3, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Anime', 'category_id' => 3, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Water', 'category_id' => 4, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Beer', 'category_id' => 4, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Juice', 'category_id' => 4, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Banana', 'category_id' => 5, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Apple', 'category_id' => 5, 'user_id' => '1'], // subcategory_id=3//category_id=2
            ['name' => 'Orange', 'category_id' => 5, 'user_id' => '1'], // subcategory_id=3//category_id=2
        ];
        foreach ($subcatrogies as $key => $value) {
            SubCategory::create($value);
        }
    }
}
