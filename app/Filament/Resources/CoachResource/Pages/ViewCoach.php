<?php

namespace App\Filament\Resources\CoachResource\Pages;

use App\Filament\Resources\CoachResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Actions\ViewAction;

class ViewCoach extends ViewRecord
{
    protected static string $resource = CoachResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
        ];
    }
}
