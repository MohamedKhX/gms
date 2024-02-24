<?php

namespace App\Filament\Coach\Resources\NoteResource\Pages;

use App\Filament\Coach\Resources\NoteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNote extends CreateRecord
{
    protected static string $resource = NoteResource::class;
}
