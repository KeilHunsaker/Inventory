<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        //        $categories[] = Category::factory()->setName('Electronics')->create();
        //        $categories[] = Category::factory()->setName('Office Supplies')->create();
        //        $categories[] = Category::factory()->setName('Electrical')->create();
        //        $categories[] = Category::factory()->setName('Fastener')->create();
        //        $categories[] = Category::factory()->setName('Software')->create();
        //
        //        Item::factory(200)->create();

        // 1. Create the Super Admin
        User::factory()->admin()->setEmail('test@test.com')->create([
            'name' => 'Admin User',
            //            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            //            'role' => UserRole::Admin,
        ]);

        // 2. Create a Manager (Restricted Access)
        User::factory()->manager()->setEmail('testman@test.com')->create([
            'name' => 'Manager User',
            //            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            //            'role' => UserRole::Manager,
        ]);

        // 3. Create Categories and their Items
        $categories = [
            'Electronics' => ['Laptop', 'Smartphone', 'Monitor', 'Keyboard'],
            'Furniture' => ['Office Chair', 'Standing Desk', 'Bookshelf'],
            'Office Supplies' => ['Paper Ream', 'Stapler', 'Notebooks', 'Pens'],
        ];

        foreach ($categories as $categoryName => $items) {
            $category = Category::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
                'is_visible' => true,
            ]);

            foreach ($items as $itemName) {
                Item::create([
                    'category_id' => $category->id,
                    'name' => $itemName,
                    'sku' => strtoupper(substr($categoryName, 0, 3)) . '-' . rand(1000, 9999),
                    'quantity' => rand(5, 100),
                    'status' => \App\Enums\ItemStatus::InStock,
                    'price' => rand(100, 1000),
                ]);
            }
        }
    }
}
