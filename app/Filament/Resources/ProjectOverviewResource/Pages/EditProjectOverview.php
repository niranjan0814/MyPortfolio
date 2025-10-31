<?php

namespace App\Filament\Resources\ProjectOverviewResource\Pages;

use App\Filament\Resources\ProjectOverviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectOverview extends EditRecord
{
    protected static string $resource = ProjectOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
