<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Utilities\Set;

// Explicitly import the components we need
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Name Field
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                // Slug Field
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->readOnly(),

                // Description
                Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                // Visibility Toggle
                Toggle::make('is_visible')
                    ->label('Visible to Customers')
                    ->default(true),
            ]);
    }
}
