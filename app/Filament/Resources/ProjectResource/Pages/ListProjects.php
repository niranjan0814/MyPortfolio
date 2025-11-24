<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // 🔍 Preview My Portfolio Button
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

            // ➕ Your existing Create button
            Actions\CreateAction::make(),
        ];
    }
}
