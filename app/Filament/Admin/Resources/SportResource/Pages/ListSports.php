<?php

namespace App\Filament\Admin\Resources\SportResource\Pages;

use App\Filament\Admin\Resources\SportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSports extends ListRecords
{
    protected static string $resource = SportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
