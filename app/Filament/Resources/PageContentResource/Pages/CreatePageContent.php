<?php

namespace App\Filament\Resources\PageContentResource\Pages;

use App\Filament\Resources\PageContentResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePageContent extends CreateRecord
{
    protected static string $resource = PageContentResource::class;

    // ✅ Automatically set user_id when creating new content
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // If user_id is not set (non-admin users), set it to current user
        if (!isset($data['user_id']) || empty($data['user_id'])) {
            $data['user_id'] = Auth::id();
        }
        
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}