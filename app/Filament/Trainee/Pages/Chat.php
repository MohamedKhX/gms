<?php

namespace App\Filament\Trainee\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Chat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static string $view = 'filament.trainee.pages.chat';

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return __('Chats');
    }

    public static function getLabel(): ?string
    {
        return __('Chat');
    }

    public function getTitle(): string|Htmlable
    {
        return __("Chats");
    }
}
