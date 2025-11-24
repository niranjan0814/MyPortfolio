<?php

namespace App\Filament\Resources\ProjectOverviewResource\Pages;

use App\Filament\Resources\ProjectOverviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectOverviews extends ListRecords
{
    protected static string $resource = ProjectOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // 🔍 Preview Portfolio Button
            Actions\Action::make('preview')
                ->label('Preview My Portfolio')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->modalHeading('Portfolio Preview')
                ->modalWidth('7xl')
                ->modalContent(view('filament.modals.portfolio-preview'))
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close'),

            // ➕ Create Button (existing)
            Actions\CreateAction::make(),
        ];
    }
}
