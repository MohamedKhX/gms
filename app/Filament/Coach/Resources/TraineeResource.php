<?php

namespace App\Filament\Coach\Resources;

use App\Enums\UserType;
use App\Filament\Coach\Resources\TraineeResource\Pages;
use App\Filament\Coach\Resources\TraineeResource\RelationManagers;
use App\Models\Trainee;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class TraineeResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'iconpark-usertousertransmission-o';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Full Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
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

    public static function getEloquentQuery(): Builder
    {
        //write
        return User::query()
            ->where('type', UserType::Trainee);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainees::route('/'),
            'create' => Pages\CreateTrainee::route('/create'),
            'edit' => Pages\EditTrainee::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Trainees');
    }

    public static function getLabel(): ?string
    {
        return __('Trainee');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Trainees');
    }
}
