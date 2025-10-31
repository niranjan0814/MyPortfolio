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
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Populate social_data for editing
        if ($data['type'] === 'json' && str_contains($data['key'], 'social_link_')) {
            $socialData = json_decode($data['value'], true);
            $data['social_data'] = [
                'social_name' => $socialData['name'] ?? '',
                'social_url' => $socialData['url'] ?? '',
                'social_icon' => $socialData['icon'] ?? '',
                'social_color' => $socialData['color'] ?? '#3b82f6',
            ];
        }

        // Convert boolean string to actual boolean for toggle
        if ($data['type'] === 'boolean') {
            $data['value'] = filter_var($data['value'], FILTER_VALIDATE_BOOLEAN);
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return HeroContentResource::mutateFormDataBeforeSave($data);
    }
}