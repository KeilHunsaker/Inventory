<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('category can be created', function () {
    $category = Category::factory()->create([
        'name' => 'Electronics',
        'slug' => 'electronics',
        'description' => 'Electronic items',
    ]);

    expect($category->name)->toBe('Electronics');
    expect($category->slug)->toBe('electronics');
    expect($category->description)->toBe('Electronic items');
});

test('category has fillable attributes', function () {
    $category = new Category([
        'name' => 'Test Category',
        'slug' => 'test-category',
        'description' => 'Test Description',
    ]);

    expect($category->name)->toBe('Test Category');
    expect($category->slug)->toBe('test-category');
    expect($category->description)->toBe('Test Description');
});
