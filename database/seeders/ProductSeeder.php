<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Books (Category 1)
            ['name' => 'The Great Gatsby', 'subcategory_id' => 1, 'category_id' => 1, 'price' => 15, 'qty' => 10, 'description' => 'Classic fiction novel'],
            ['name' => '1984', 'subcategory_id' => 1, 'category_id' => 1, 'price' => 12, 'qty' => 5, 'description' => 'Dystopian fiction'],
            ['name' => 'Sapiens', 'subcategory_id' => 2, 'category_id' => 1, 'price' => 20, 'qty' => 8, 'description' => 'History of humankind'],
            ['name' => 'The Silk Roads', 'subcategory_id' => 2, 'category_id' => 1, 'price' => 22, 'qty' => 4, 'description' => 'A new history of the world'],
            ['name' => 'Calculus Made Easy', 'subcategory_id' => 3, 'category_id' => 1, 'price' => 30, 'qty' => 12, 'description' => 'Math basics'],
            ['name' => 'Linear Algebra', 'subcategory_id' => 3, 'category_id' => 1, 'price' => 35, 'qty' => 7, 'description' => 'Advanced math'],
            ['name' => 'Ancient Egypt', 'subcategory_id' => 4, 'category_id' => 1, 'price' => 25, 'qty' => 3, 'description' => 'Archaeology study'],
            ['name' => 'The Maya', 'subcategory_id' => 4, 'category_id' => 1, 'price' => 28, 'qty' => 6, 'description' => 'Ancient civilizations'],

            // Food (Category 2)
            ['name' => 'Fish Amok', 'subcategory_id' => 5, 'category_id' => 2, 'price' => 8, 'qty' => 20, 'description' => 'Authentic Khmer food'],
            ['name' => 'Beef Lok Lak', 'subcategory_id' => 5, 'category_id' => 2, 'price' => 7, 'qty' => 15, 'description' => 'Popular Khmer dish'],
            ['name' => 'Cheese Burger', 'subcategory_id' => 6, 'category_id' => 2, 'price' => 5, 'qty' => 50, 'description' => 'Classic fast food'],
            ['name' => 'French Fries', 'subcategory_id' => 6, 'category_id' => 2, 'price' => 3, 'qty' => 100, 'description' => 'Crispy side dish'],
            ['name' => 'Quinoa Salad', 'subcategory_id' => 7, 'category_id' => 2, 'price' => 10, 'qty' => 12, 'description' => 'Healthy diet option'],
            ['name' => 'Boiled Chicken Breast', 'subcategory_id' => 7, 'category_id' => 2, 'price' => 9, 'qty' => 10, 'description' => 'High protein meal'],

            // Movie (Category 3)
            ['name' => 'Our Planet', 'subcategory_id' => 8, 'category_id' => 3, 'price' => 15, 'qty' => 30, 'description' => 'Nature documentary'],
            ['name' => 'The Social Dilemma', 'subcategory_id' => 8, 'category_id' => 3, 'price' => 12, 'qty' => 25, 'description' => 'Tech documentary'],
            ['name' => 'Inception', 'subcategory_id' => 9, 'category_id' => 3, 'price' => 18, 'qty' => 40, 'description' => 'Sci-fi thriller'],
            ['name' => 'Interstellar', 'subcategory_id' => 9, 'category_id' => 3, 'price' => 20, 'qty' => 35, 'description' => 'Space sci-fi'],
            ['name' => 'The Notebook', 'subcategory_id' => 10, 'category_id' => 3, 'price' => 10, 'qty' => 20, 'description' => 'Classic romance'],
            ['name' => 'About Time', 'subcategory_id' => 10, 'category_id' => 3, 'price' => 12, 'qty' => 15, 'description' => 'Romantic comedy'],
            ['name' => 'Naruto', 'subcategory_id' => 11, 'category_id' => 3, 'price' => 25, 'qty' => 100, 'description' => 'Classic anime series'],
            ['name' => 'One Piece', 'subcategory_id' => 11, 'category_id' => 3, 'price' => 25, 'qty' => 100, 'description' => 'Pirate adventure anime'],

            // Drink (Category 4)
            ['name' => 'Mineral Water', 'subcategory_id' => 12, 'category_id' => 4, 'price' => 1, 'qty' => 200, 'description' => 'Natural spring water'],
            ['name' => 'Sparkling Water', 'subcategory_id' => 12, 'category_id' => 4, 'price' => 2, 'qty' => 150, 'description' => 'Carbonated water'],
            ['name' => 'Angkor Beer', 'subcategory_id' => 13, 'category_id' => 4, 'price' => 3, 'qty' => 80, 'description' => 'Local favorite'],
            ['name' => 'Heineken', 'subcategory_id' => 13, 'category_id' => 4, 'price' => 4, 'qty' => 60, 'description' => 'International lager'],
            ['name' => 'Apple Juice', 'subcategory_id' => 14, 'category_id' => 4, 'price' => 3, 'qty' => 40, 'description' => 'Freshly squeezed'],
            ['name' => 'Orange Juice', 'subcategory_id' => 14, 'category_id' => 4, 'price' => 3, 'qty' => 45, 'description' => 'Vit C rich'],

            // Fruit (Category 5)
            ['name' => 'Yellow Banana', 'subcategory_id' => 15, 'category_id' => 5, 'price' => 2, 'qty' => 60, 'description' => 'Sweet banana'],
            ['name' => 'Green Banana', 'subcategory_id' => 15, 'category_id' => 5, 'price' => 1, 'qty' => 40, 'description' => 'Cooking banana'],
            ['name' => 'Red Apple', 'subcategory_id' => 16, 'category_id' => 5, 'price' => 3, 'qty' => 80, 'description' => 'Fuji apple'],
            ['name' => 'Green Apple', 'subcategory_id' => 16, 'category_id' => 5, 'price' => 3, 'qty' => 70, 'description' => 'Granny Smith'],
            ['name' => 'Navel Orange', 'subcategory_id' => 17, 'category_id' => 5, 'price' => 4, 'qty' => 50, 'description' => 'Seedless orange'],
            ['name' => 'Valencia Orange', 'subcategory_id' => 17, 'category_id' => 5, 'price' => 4, 'qty' => 55, 'description' => 'Juicy orange'],
        ];
        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
