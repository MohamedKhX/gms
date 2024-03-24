<?php

namespace App\Filament\Admin\Resources;

use App\Enums\Gender;
use App\Filament\Resources\NoteResource\Pages;
use App\Filament\Resources\NoteResource\RelationManagers;
use App\Models\Note;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/*
 هذه الصفحة خاصة بالملاحظات
لوحة التحكم: الادمن
 * */
class NoteResource extends Resource
{
    protected static ?string $model = Note::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    /*
    هذه الدالة تحدد الحقول التي سيتم عرضها في الجدول
     * */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Sender Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('user.type')
                    ->label('Sender Type')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge()
                    ->color(''),


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
                Tables\Actions\ViewAction::make()
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->color(''),
            ]);
    }


    /*
     هذه الدالة تحدد الحقول التي سيتم عرضها في النموذج
     * */
    public static function infolist(\Filament\Infolists\Infolist $infolist):  \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                Fieldset::make('Sender Info')
                    ->translateLabel()
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Sender Name')
                            ->translateLabel(),

                        TextEntry::make('user.gender')
                            ->label('Sender Gender')
                            ->formatStateUsing(fn($state) => $state->translate())
                            ->color(fn ($state) => Gender::getColor($state))
                            ->badge()
                            ->translateLabel(),

                        TextEntry::make('user.type')
                            ->label('Sender Type')
                            ->formatStateUsing(fn($state) => $state->translate())
                            ->badge()
                            ->translateLabel(),
                    ])
                    ->columns(3),

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
            'index' => \App\Filament\Admin\Resources\NoteResource\Pages\ListNotes::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
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
