<?php

namespace App\Filament\Trainee\Pages\Auth;

use App\Enums\Gender;
use App\Enums\UserType;
use App\Models\Trainee;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Tables\Columns\TextColumn;

class Register extends \Filament\Pages\Auth\Register
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->label('First Name')
                    ->translateLabel()
                    ->autofocus()
                    ->required(),

                TextInput::make('middle_name')
                    ->label('Middle Name')
                    ->translateLabel()
                    ->required(),

                TextInput::make('last_name')
                    ->label('Last Name')
                    ->translateLabel()
                    ->required(),

                TextInput::make('city')
                    ->label('City')
                    ->translateLabel()
                    ->autofocus()
                    ->required(),

                TextInput::make('region')
                    ->label('Region')
                    ->translateLabel()
                    ->required(),

                TextInput::make('street')
                    ->label('Street')
                    ->translateLabel()
                    ->required(),


                TextInput::make('phone')
                    ->label('Phone Number')
                    ->translateLabel()
                    ->required()
                    ->columnSpan(3),

                Select::make('gender')
                    ->label('Gender')
                    ->translateLabel()
                    ->options(Gender::getTranslations())
                    ->required()
                    ->columnSpan(3),

                Hidden::make('type')
                    ->default(UserType::Trainee->value),

                $this->getEmailFormComponent()
                    ->columnSpan(3),
                $this->getPasswordFormComponent()
                    ->columnSpan(3),
                $this->getPasswordConfirmationFormComponent()
                    ->columnSpan(3),
            ])
            ->columns(3);
    }
}
