<?php

namespace App\Filament\Admin\Resources;

use App\Enums\Gender;
use App\Enums\UserType;
use App\Filament\Resources\CoachResource\Pages;
use App\Filament\Resources\CoachResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

/*
 هذه الصفحة خاصة بالمدربين
لوحة التحكم: الادمن
 * */
class CoachResource extends Resource
{
    protected static ?string $model = User::class;

    /*
        هذه الدالة تحدد الاستعلام الذي سيتم استخدامه لجلب البيانات
     * */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('type', '=', UserType::Coach);
    }

    protected static ?string $navigationIcon = 'iconpark-muscle-o';

    protected static ?string $navigationGroup = 'مركز اللياقة';

    /*
     هذه الدالة تحدد الحقول التي ستظهر في صفحة الإنشاء أو تعديل
     * */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('user')
                    ->label("Coach Info")
                    ->translateLabel()
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->label('Name')
                            ->translateLabel()
                            ->required()
                            ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                            ->minLength(3)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('middle_name')
                            ->label('Middle Name')
                            ->translateLabel()
                            ->required()
                            ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                            ->minLength(3)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('last_name')
                            ->label('Last Name')
                            ->translateLabel()
                            ->required()
                            ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                            ->minLength(3)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('city')
                            ->label('City')
                            ->translateLabel()
                            ->required()
                            ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                            ->minLength(3)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('region')
                            ->label('Region')
                            ->translateLabel()
                            ->required()
                            ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                            ->minLength(3)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('street')
                            ->label('Street')
                            ->translateLabel()
                            ->required()
                            ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                            ->minLength(3)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')
                            ->label('Phone Number')
                            ->translateLabel()
                            ->required()
                            ->tel()
                            ->numeric()
                            ->unique('users', 'phone', ignoreRecord: true)

                            ->maxLength(255),

                        Forms\Components\Select::make('gender')
                            ->label('Gender')
                            ->translateLabel()
                            ->options(Gender::getTranslations())
                            ->required(),

                        Forms\Components\Hidden::make('type')
                            ->default(UserType::Coach->value),

                        Forms\Components\Fieldset::make('user info')
                            ->label('User Info')
                            ->translateLabel()
                            ->schema([
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->translateLabel()
                                    ->required()
                                    ->email()
                                    ->unique('users', 'email', ignoreRecord: true)
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('password')
                                    ->label('Password')
                                    ->translateLabel()
                                    ->required()
                                    ->password()
                                    ->maxLength(255)
                                    ->disabledOn(['edit', 'view'])
                                    ->hiddenOn(['edit', 'view']),
                            ])
                            ->columns(1)
                    ])
                    ->columns(3),

                Forms\Components\Fieldset::make('coach')
                    ->schema([])
                    ->relationship('coach')
                    ->extraAttributes(['class' => 'hidden'])
            ]);
    }

    /*
     هذه الدالة تحدد الحقول التي ستظهر في الجدول
     * */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('middle_name')
                    ->label('Middle Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('last_name')
                    ->label('Last Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge()
                    ->color(''),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color(''),
                Tables\Actions\DeleteAction::make()
                    ->color(''),
                Tables\Actions\ViewAction::make()
                    ->color('')
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
            'index' => \App\Filament\Admin\Resources\CoachResource\Pages\ListCoaches::route('/'),
            'create' => \App\Filament\Admin\Resources\CoachResource\Pages\CreateCoach::route('/create'),
            'edit' => \App\Filament\Admin\Resources\CoachResource\Pages\EditCoach::route('/{record}/edit'),
            'view' => \App\Filament\Admin\Resources\CoachResource\Pages\ViewCoach::route('/{record}'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Coaches');
    }

    public static function getLabel(): ?string
    {
        return __('Coach');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Coaches');
    }
}
