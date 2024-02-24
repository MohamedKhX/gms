<?php

namespace App\Filament\Trainee\Resources\DietResource\Pages;

use App\Filament\Trainee\Resources\DietResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiet extends EditRecord
{
    protected static string $resource = DietResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
