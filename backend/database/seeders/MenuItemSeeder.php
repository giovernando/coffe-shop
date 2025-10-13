<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            // Coffee
            [
                'name' => 'Espresso',
                'description' => 'Rich and bold espresso shot',
                'price' => 3.50,
                'category' => 'coffee',
                'image' => 'espresso.jpg',
                'available' => true,
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Espresso with steamed milk and foam',
                'price' => 4.50,
                'category' => 'coffee',
                'image' => 'cappuccino.jpg',
                'available' => true,
            ],
            [
                'name' => 'Latte',
                'description' => 'Espresso with steamed milk',
                'price' => 4.00,
                'category' => 'coffee',
                'image' => 'latte.jpg',
                'available' => true,
            ],
            [
                'name' => 'Green Tea',
                'description' => 'Traditional green tea',
                'price' => 3.00,
                'category' => 'tea',
                'image' => 'green-tea.jpg',
                'available' => true,
            ],

            // Food
            [
                'name' => 'Croissant',
                'description' => 'Buttery and flaky pastry',
                'price' => 3.50,
                'category' => 'food',
                'image' => 'croissant.jpg',
                'available' => true,
            ],
            [
                'name' => 'Club Sandwich',
                'description' => 'Turkey, bacon, lettuce, tomato',
                'price' => 8.50,
                'category' => 'food',
                'image' => 'club-sandwich.jpg',
                'available' => true,
            ],
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}
