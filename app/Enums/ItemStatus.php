<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ItemStatus: string implements HasColor, HasLabel
{
    case Draft = 'draft';
    case InStock = 'in_stock';
    case Reserved = 'reserved';
    case Sold = 'sold';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::InStock => 'In Stock',
            self::Reserved => 'Reserved',
            self::Sold => 'Sold',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Draft => 'gray',
            self::InStock => 'success',  // Green
            self::Reserved => 'warning',  // Orange
            self::Sold => 'danger',     // Red
        };
    }
}
