<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name') // Logic: "Look at the 'category' method on the Item model, and show the 'name' column."
                    ->searchable() // UX: Lets user type to find "Electronics" instead of scrolling
                    ->preload() // UX: Loads the list immediately so the dropdown isn't empty at first click
                    ->required()
                    ->createOptionForm([ // Senior Bonus: Lets you create a new Category right inside the Item form!
                        // You could copy your CategoryForm schema here if you wanted
                    ])
                    ->label('Category'),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('sku')
                    ->label('SKU')
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('notes'),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
            ]);
    }
}
