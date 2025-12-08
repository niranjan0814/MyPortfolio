<?php

namespace App\Filament\Resources\ProjectOverviewResource\Pages;

use App\Filament\Resources\ProjectOverviewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectOverview extends CreateRecord
{
    protected static string $resource = ProjectOverviewResource::class;

    /**
     * Add Preview Button
     */
    protected function getHeaderActions(): array
    {
        return [
            // 🔍 Preview Portfolio Modal Button
            Actions\Action::make('preview')
                ->label('Preview My Portfolio')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->modalHeading('Portfolio Preview')
                ->modalWidth('7xl')
                ->modalContent(view('filament.modals.portfolio-preview'))
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close'),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Project Overview updated successfully';
    }
}
