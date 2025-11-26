<?php

namespace App\Filament\Resources\ThemeCommentsResource\Pages;

use App\Filament\Resources\ThemeCommentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThemeComments extends EditRecord
{
    protected static string $resource = ThemeCommentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
