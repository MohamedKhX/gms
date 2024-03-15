<?php

namespace App\Filament\Trainee\Resources;

use App\Enums\Gender;
use App\Filament\Trainee\Resources\NoteResource\Pages;
use App\Filament\Trainee\Resources\NoteResource\RelationManagers;
use App\Models\Note;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NoteResource extends Resource
{
    protected static ?string $model = Note::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->translateLabel(),

                    Forms\Components\Textarea::make('details')
                        ->label('Details')
                        ->translateLabel(),

                    Forms\Components\Hidden::make('user_id')
                        ->default(Filament::auth()->id()),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->translateLabel()
                    ->words(5),

                Tables\Columns\TextColumn::make('details')
                    ->label('Details')
                    ->translateLabel()
                    ->words(4),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->color('primary'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist):  \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                Fieldset::make('Note Info')
                    ->translateLabel()
                    ->schema([
                        TextEntry::make('title')
                            ->label('Title')
                            ->translateLabel(),

                        TextEntry::make('details')
                            ->label('Details')
                            ->translateLabel(),
                    ])
                    ->columns(1),


            ])
            ->columns(1);
    }





























    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotes::route('/'),/*
            'create' => Pages\CreateNote::route('/create'),
            'edit' => Pages\EditNote::route('/{record}/edit'),*/
        ];
    }


    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('user_id', '=', Filament::auth()->id());
    }


    public static function getNavigationLabel(): string
    {
        return __('Notes');
    }

    public static function getLabel(): ?string
    {
        return __('Note');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Notes');
    }
}
