<?php

namespace App\Filament\Admin\Resources;

use App\Enums\SportStatus;
use App\Filament\Resources\SportResource\Pages;
use App\Filament\Resources\SportResource\RelationManagers;
use App\Models\Sport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/*
هذه الصفحة خاصة بالرياضات
لوحة التحكم: الادمن
 * */
class SportResource extends Resource
{
    protected static ?string $model = Sport::class;

    protected static ?string $navigationIcon = 'iconpark-sport-o';

    protected static ?string $navigationGroup = 'مركز اللياقة';

    /*
      هذه الدالة تحدد الحقول التي ستظهر في صفحة الإنشاء أو تعديل
      * */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Sport Name')
                    ->translateLabel()
                    ->required()
                    ->maxLength(255)
                    ->unique('sports', 'name', ignoreRecord: true),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->translateLabel()
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->options(SportStatus::getTranslations())
                    ->required()
            ])
            ->columns(1);
    }

    /*
       هذه الدالة تحدد الحقول التي ستظهر في الجدول
       * */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Sport Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge()
                    ->color(''),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->translateLabel()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->color('danger')
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
            'index' => \App\Filament\Admin\Resources\SportResource\Pages\ListSports::route('/'),
/*            'create' => Pages\CreateSport::route('/create'),
            'edit' => Pages\EditSport::route('/{record}/edit'),*/
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Sports');
    }

    public static function getLabel(): ?string
    {
        return __('Sport');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Sports');
    }
}
