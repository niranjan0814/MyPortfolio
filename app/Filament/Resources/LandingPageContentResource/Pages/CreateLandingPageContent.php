<?php

namespace App\Filament\Resources\LandingPageContentResource\Pages;

use App\Filament\Resources\LandingPageContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLandingPageContent extends CreateRecord
{
    protected static string $resource = LandingPageContentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Landing page content created successfully';
    }
}