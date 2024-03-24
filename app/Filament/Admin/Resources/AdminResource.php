<?php

namespace App\Filament\Admin\Resources;

use App\Enums\Gender;
use App\Enums\UserType;
use App\Filament\Admin\Resources\AdminResource\Pages;
use App\Filament\Admin\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

/*
هذه الصفحة خاصة بالمشرفين
لوحة التحكم: الادمن
 * */
class AdminResource extends Resource
{
    protected static ?string $model = User::class;

    /*
هذه الدالة تحدد الاستعلام الذي سيتم استخدامه لجلب البيانات
     * */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('type', '=', UserType::Admin);
    }

    protected static ?string $navigationIcon = 'heroicon-s-user-circle';

    protected static ?string $navigationGroup = 'المركز الإداري';

    protected static ?int $navigationSort = 4;

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
                            ->default(UserType::Admin->value),

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
            ]);
    }

    /*
     هذه الدالة تحدد الحقول التي ستظهر في الجدول
     * */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->translateLabel()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->translateLabel()
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn($state) => $state->translate()),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('primary'),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }


    public static function getNavigationLabel(): string
    {
        return __('Admins');
    }

    public static function getLabel(): ?string
    {
        return __('Admin');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Admins');
    }
}
