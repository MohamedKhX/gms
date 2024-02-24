<?php

namespace App\Filament\Admin\Resources\SportResource\Pages;

use App\Filament\Admin\Resources\SportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSport extends EditRecord
{
    protected static string $resource = SportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
