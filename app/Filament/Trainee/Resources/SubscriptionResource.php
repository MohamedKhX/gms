<?php

namespace App\Filament\Trainee\Resources;

use App\Enums\SubscriptionStatus;
use App\Filament\Trainee\Resources\SubscriptionResource\Pages;
use App\Filament\Trainee\Resources\SubscriptionResource\RelationManagers;
use App\Models\Subscription;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plan.name')
                    ->label('Plan')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start Date')
                    ->translateLabel()
                    ->badge()
                    ->color(Color::Amber)
                    ->date(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('End Date')
                    ->translateLabel()
                    ->badge()
                    ->color(Color::Amber)
                    ->date(),

                Tables\Columns\TextColumn::make('price')
                    ->translateLabel()
                    ->label('Price')
                    ->badge()
                    ->color('success')
                    ->suffix(' د.ل ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->badge()
                    ->color(fn($record) => SubscriptionStatus::getColor($record->status))
            ])
            ->filters([

            ])
            ->actions([
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptions::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('trainee_id', '=', Filament::auth()->user()->trainee->id);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationLabel(): string
    {
        return __('Subscriptions');
    }

    public static function getLabel(): ?string
    {
        return __('Subscription');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Subscriptions');
    }
}
