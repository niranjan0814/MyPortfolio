<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    /** Remove the password key when it is empty – safety net */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) {
            unset($data['password']);
        }
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('view_portfolio')
                ->label('View Live Portfolio')
                ->icon('heroicon-o-globe-alt')
                ->url(fn() => route('portfolio.show', $this->record->slug))
                ->openUrlInNewTab()
                ->color('info'),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getSavedNotificationTitle(): ?string
    {
        return 'User updated successfully';
    }
}