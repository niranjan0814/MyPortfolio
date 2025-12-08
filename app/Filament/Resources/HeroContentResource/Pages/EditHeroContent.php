<?php

namespace App\Filament\Resources\HeroContentResource\Pages;

use App\Filament\Resources\HeroContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroContent extends EditRecord
{
    protected static string $resource = HeroContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // 🔍 Preview My Portfolio
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
        return 'Hero Content updated successfully';
    }
}
