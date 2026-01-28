<?php

use App\Models\Category;
use App\Models\Item;
use App\Enums\ItemStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('item can be created', function () {
    $category = Category::factory()->create();

    $item = Item::factory()->create([
        'category_id' => $category->id,
        'name' => 'Laptop',
        'price' => 999.99,
        'quantity' => 10,
        'status' => ItemStatus::InStock,
    ]);

    expect($item->name)->toBe('Laptop');
    expect($item->price)->toBe(999.99);
    expect($item->quantity)->toBe(10);
    expect($item->status)->toBe(ItemStatus::InStock);
    expect($item->category_id)->toBe($category->id);
});

test('item belongs to a category', function () {
    $category = Category::factory()->create();
    $item = Item::factory()->create(['category_id' => $category->id]);

    expect($item->category)->toBeInstanceOf(Category::class);
    expect($item->category->id)->toBe($category->id);
});

test('item casts attributes correctly', function () {
    $category = Category::factory()->create();
    $item = Item::factory()->create([
        'category_id' => $category->id,
        'price' => '123.45',
        'quantity' => '50',
        'is_visible' => 1,
    ]);

    expect($item->price)->toBeFloat()->toBe(123.45);
    expect($item->quantity)->toBeInt()->toBe(50);
    expect($item->is_visible)->toBeBool()->toBeTrue();
});
