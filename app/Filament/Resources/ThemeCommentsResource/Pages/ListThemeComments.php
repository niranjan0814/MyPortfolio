<?php
// ========================================
// app/Filament/Resources/ThemeCommentsResource/Pages/ListThemeComments.php
// ========================================

namespace App\Filament\Resources\ThemeCommentsResource\Pages;

use App\Filament\Resources\ThemeCommentsResource;
use Filament\Resources\Pages\ListRecords;

class ListThemeComments extends ListRecords
{
    protected static string $resource = ThemeCommentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No create action - comments are created by users on frontend
        ];
    }
}

// ========================================
// app/Filament/Resources/ThemeCommentsResource/Pages/ViewThemeComment.php
// ========================================

namespace App\Filament\Resources\ThemeCommentsResource\Pages;

use App\Filament\Resources\ThemeCommentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewThemeComment extends ViewRecord
{
    protected static string $resource = ThemeCommentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Toggle approval action
            Actions\Action::make('toggle_approval')
                ->label(fn () => $this->record->is_approved ? 'Unapprove Comment' : 'Approve Comment')
                ->icon(fn () => $this->record->is_approved ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                ->color(fn () => $this->record->is_approved ? 'danger' : 'success')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update(['is_approved' => !$this->record->is_approved]);
                    $this->refreshFormData(['is_approved']);
                })
                ->successNotificationTitle(fn () => 
                    $this->record->is_approved ? 'Comment approved successfully' : 'Comment unapproved'
                ),

            // Delete action
            Actions\DeleteAction::make()
                ->requiresConfirmation()
                ->modalHeading('Delete Comment')
                ->modalDescription('This will also delete all replies to this comment. This action cannot be undone.')
                ->successNotificationTitle('Comment deleted successfully')
                ->successRedirectUrl(route('filament.admin.resources.theme-comments.index')),
        ];
    }

}