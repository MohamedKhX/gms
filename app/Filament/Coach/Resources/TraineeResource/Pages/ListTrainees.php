<?php

namespace App\Filament\Coach\Resources\TraineeResource\Pages;

use App\Filament\Coach\Resources\TraineeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainees extends ListRecords
{
    protected static string $resource = TraineeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
