<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =[
            ['name'=>'Book','user_id'=>'1',],//category_id =1
            ['name'=> 'Food','user_id'=>'1',],            //category_id=2
            ['name'=> 'Movie','user_id'=>'1',],            //category_id=3
            ['name'=> 'Drink','user_id'=>'1',],            //category_id=4
            ['name'=> 'Fruit','user_id'=>'1',],            //category_id=5
        ];
        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
