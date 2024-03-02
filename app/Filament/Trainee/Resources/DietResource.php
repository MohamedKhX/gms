<?php

namespace App\Filament\Trainee\Resources;

use App\Filament\Trainee\Resources\DietResource\Pages;
use App\Filament\Trainee\Resources\DietResource\RelationManagers;
use App\Models\Diet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DietResource extends Resource
{
    protected static ?string $model = Diet::class;

    protected static ?string $navigationIcon = 'iconpark-banana';

    protected static ?int $navigationSort = 5;

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
                Tables\Columns\TextColumn::make('name')
                    ->label('Diet')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('coach.user.name')
                    ->label('Coach')
                    ->translateLabel(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->pluralModelLabel('أنظمة غذائية يمكنك الحصول على نظام غذائي بتواصل مع مدرب خاص');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('content')
                    ->label('Diet')
                    ->translateLabel()
                    ->extraAttributes(['class' => 'bg-gray-4    00'])
                    ->markdown(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiets::route('/'),
            'view' => Pages\ViewDiet::route('/{record}'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Diets');
    }

    public static function getLabel(): ?string
    {
        return __('Diet');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Diets');
    }
}
