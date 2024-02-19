<?php

namespace App\Filament\Resources;

use App\Enums\SubscriptionStatus;
use App\Filament\Resources\SubscriptionResource\Pages;
use App\Filament\Resources\SubscriptionResource\RelationManagers;
use App\Models\Plan;
use App\Models\Subscription;
use Filament\Actions\DeleteAction;
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

    protected static ?string $navigationGroup = 'إدارة الاشتراكات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('subscription info')
                    ->label(__('Subscription Information'))
                    ->schema([
                        Forms\Components\Select::make('trainee_id')
                            ->label('Trainee')
                            ->translateLabel()
                            ->placeholder(__('Select the trainee'))
                            ->options(\App\Models\Trainee::all()->pluck('name', 'id'))
                            ->searchable()
                            ->prefixIcon('iconpark-muscle-o')
                            ->required(),

                        Forms\Components\Select::make('plan_id')
                            ->label('Plan')
                            ->translateLabel()
                            ->placeholder(__('Select the plan'))
                            ->options(Plan::all()->pluck('name', 'id'))
                            ->searchable()
                            ->prefixIcon('heroicon-o-cube-transparent')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trainee.name')
                    ->label('Trainee')
                    ->translateLabel(),

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
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListSubscriptions::route('/'),
            'create' => Pages\CreateSubscription::route('/create'),
/*            'edit' => Pages\EditSubscription::route('/{record}/edit'),*/
        ];
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
