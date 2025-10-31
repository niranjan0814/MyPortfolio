<?php
namespace App\Filament\Resources\HeroContentResource\Pages;

use App\Filament\Resources\HeroContentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHeroContent extends CreateRecord
{
    protected static string $resource = HeroContentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return HeroContentResource::mutateFormDataBeforeCreate($data);
    }
}