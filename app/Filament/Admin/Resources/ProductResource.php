<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    //protected static ?string $navigationGroup = 'متجر الصالة';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\ProductResource\Pages\ListProducts::route('/'),
            'create' => \App\Filament\Admin\Resources\ProductResource\Pages\CreateProduct::route('/create'),
            'edit' => \App\Filament\Admin\Resources\ProductResource\Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Products');
    }

    public static function getLabel(): ?string
    {
        return __('Product');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Products');
    }
}
