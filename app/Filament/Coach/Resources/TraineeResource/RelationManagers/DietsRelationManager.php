<?php

namespace App\Filament\Coach\Resources\TraineeResource\RelationManagers;

use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DietsRelationManager extends RelationManager
{
    protected static string $relationship = 'diets';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Diet Name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255),

                Forms\Components\RichEditor::make('content')
                    ->label('Content')
                    ->translateLabel()
                    ->required(),

                Forms\Components\Hidden::make('coach_id')
                    ->default(Filament::auth()->user()->coach->id),
            ])
            ->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Diet Name')
                    ->translateLabel(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }


    public function isReadOnly(): bool
    {
        return false;
    }

    public static function getRecordLabel(): string
    {
        return __('Diet');
    }

    public static function getModelLabel(): ?string
    {
        return __('Diet');
    }

    public static function getPluralModelLabel(): ?string
    {
        return __('Diets');
    }
}
