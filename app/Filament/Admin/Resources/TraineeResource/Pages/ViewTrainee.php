<?php

namespace App\Filament\Admin\Resources\TraineeResource\Pages;

use App\Filament\Admin\Resources\TraineeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTrainee extends ViewRecord
{
    protected static string $resource = TraineeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
        ];
    }
}
