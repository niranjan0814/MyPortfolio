<?php

namespace App\Filament\Resources\EducationResource\Pages;

use App\Filament\Resources\EducationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducation extends EditRecord
{
    protected static string $resource = EducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Preview Button
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

            // Your existing delete action
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Education updated successfully';
    }
}
