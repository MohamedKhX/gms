<?php

namespace App\Filament\Trainee\Resources\NoteResource\Pages;

use App\Filament\Trainee\Resources\NoteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNote extends CreateRecord
{
    protected static string $resource = NoteResource::class;
}
