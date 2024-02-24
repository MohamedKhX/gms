<?php

namespace App\Filament\Trainee\Resources\DietResource\Pages;

use App\Filament\Trainee\Resources\DietResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiets extends ListRecords
{
    protected static string $resource = DietResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
