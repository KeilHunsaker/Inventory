<?php

namespace App\Models;

use App\Enums\ItemStatus;
use Database\Factories\ItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory as HasFactoryAlias;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactoryAlias<ItemFactory> */
    use HasFactoryAlias;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'quantity',
        'sku',
        'status',
        'notes',
        'is_visible',
    ];

    protected $casts = [
        'status' => ItemStatus::class,
        'quantity' => 'integer',
        'price' => 'float',
        'is_visible' => 'boolean',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
