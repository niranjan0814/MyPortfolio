<?php

namespace App\Filament\Resources\HeroContentResource\Pages;

use App\Filament\Resources\HeroContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroContents extends ListRecords
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

            // ➕ Create Button
            Actions\CreateAction::make(),
        ];
    }
}
