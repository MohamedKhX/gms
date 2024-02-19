<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanResource\Pages;
use App\Filament\Resources\PlanResource\RelationManagers;
use App\Models\Plan;
use App\Models\Sport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Component\Console\Input\Input;

class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    protected static ?string $navigationGroup = 'إدارة الاشتراكات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Plan Information')
                    ->label('Plan Information')
                    ->translateLabel()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Plan Name')
                            ->translateLabel()
                            ->required()
                            ->maxLength(255)
                            ->unique('plans', 'name', ignoreRecord: true)
                            ->placeholder(__('Enter the plan name'))
                            ->suffixIcon('heroicon-m-globe-alt')
                            ->columnSpan(2),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->translateLabel()
                            ->placeholder(__('Enter the plan description'))
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('price')
                            ->label('Price')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->placeholder(__('Enter the plan price'))
                            ->prefixIcon('heroicon-m-currency-dollar')
                            ->suffix('د.ل'),

                        Forms\Components\TextInput::make('duration')
                            ->label('Duration')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->placeholder(__('Enter the plan duration'))
                            ->prefixIcon('heroicon-m-clock')
                            ->suffix('يوم'),

                        Forms\Components\Select::make('sports')
                            ->label('Sports')
                            ->translateLabel()
                            ->relationship('sports')
                            ->options(Sport::all()->pluck('name', 'id')->toArray())
                            ->multiple()
                            ->searchable()
                            ->required()
                            ->placeholder(__('Select the sports'))
                            ->columnSpan(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Plan Name')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->translateLabel()
                    ->label('Description')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->translateLabel()
                    ->label('Price')
                    ->badge()
                    ->color('success')
                    ->suffix(' د.ل ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->translateLabel()
                    ->label('Duration')
                    ->badge()
                    ->color(Color::Amber)
                    ->suffix(' يوم ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sports.name')
                    ->translateLabel()
                    ->label('Sports')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPlans::route('/'),
            'create' => Pages\CreatePlan::route('/create'),
            'edit' => Pages\EditPlan::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Plans');
    }

    public static function getLabel(): ?string
    {
        return __('Plan');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Plans');
    }
}
