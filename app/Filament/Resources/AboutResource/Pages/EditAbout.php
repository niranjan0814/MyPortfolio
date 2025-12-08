<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditAbout extends EditRecord
{
    protected static string $resource = AboutResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    /**
     * Add Preview Button
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('preview')
                ->label('Preview My Portfolio')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->modalHeading('Portfolio Preview')
                ->modalWidth('7xl')
                ->modalContent(
                    view('filament.modals.portfolio-preview')
                )
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
        return ' updated successfully';
    }
}
