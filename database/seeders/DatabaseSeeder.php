<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        $categories[] = Category::factory()->setName('Electronics')->create();
        $categories[] = Category::factory()->setName('Office Supplies')->create();
        $categories[] = Category::factory()->setName('Electrical')->create();
        $categories[] = Category::factory()->setName('Fastener')->create();
        $categories[] = Category::factory()->setName('Software')->create();

        Item::factory(200)->create();
    }
}
