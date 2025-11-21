<?php
// app/Filament/Resources/ThemeResource/Pages/EditTheme.php - ENHANCED WITH USER ASSIGNMENT

namespace App\Filament\Resources\ThemeResource\Pages;

use App\Filament\Resources\ThemeResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Notifications\Notification;

class EditTheme extends EditRecord
{
    protected static string $resource = ThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ========================================
            // PREVIEW ACTION
            // ========================================
            Actions\Action::make('preview')
                ->label('Preview Theme')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->url(fn () => route('portfolio.show', [
                    'user' => auth()->user()->slug,
                    'preview' => true,
                    'theme' => $this->record->slug,
                ]))
                ->openUrlInNewTab(),

            // ========================================
            // RE-EXTRACT ZIP ACTION
            // ========================================
            Actions\Action::make('re_extract')
                ->label('Re-extract ZIP')
                ->icon('heroicon-o-arrow-path')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Re-extract Theme Files')
                ->modalDescription('This will replace all existing component files with the contents of the uploaded ZIP.')
                ->modalSubmitActionLabel('Re-extract')
                ->action(function () {
                    if ($this->record->extractZip()) {
                        Notification::make()
                            ->title('ZIP Extracted Successfully')
                            ->body('Theme components have been updated')
                            ->success()
                            ->send();
                    } else {
                        Notification::make()
                            ->title('Extraction Failed')
                            ->body('Could not extract ZIP file')
                            ->danger()
                            ->send();
                    }
                })
                ->visible(fn () => $this->record->zip_file_path),

            // ========================================
            // MANAGE USERS ACTION (MODAL)
            // ========================================
            Actions\Action::make('manage_users')
                ->label('Manage Users')
                ->icon('heroicon-o-users')
                ->color('success')
                ->modalHeading('Manage Theme Access')
                ->modalDescription('Assign or remove users from this theme')
                ->modalWidth('5xl')
                ->form([
                    Forms\Components\Section::make('Assigned Users')
                        ->description('Users who currently have access to this theme')
                        ->schema([
                            Forms\Components\Placeholder::make('current_users')
                                ->label('Current Users (' . $this->record->users()->count() . ')')
                                ->content(function () {
                                    $users = $this->record->getAssignedUsers();
                                    
                                    if ($users->isEmpty()) {
                                        return 'No users assigned yet';
                                    }
                                    
                                    return new \Illuminate\Support\HtmlString(
                                        '<div class="space-y-2">' .
                                        $users->map(fn ($user) => 
                                            '<div class="flex items-center justify-between p-2 bg-gray-50 rounded">' .
                                            '<span class="font-medium">' . ($user->full_name ?? $user->name) . '</span>' .
                                            '<span class="text-sm text-gray-500">' . $user->email . '</span>' .
                                            '</div>'
                                        )->join('') .
                                        '</div>'
                                    );
                                }),
                        ]),

                    Forms\Components\Section::make('Add Users')
                        ->description('Select users to grant access to this theme')
                        ->schema([
                            Forms\Components\CheckboxList::make('users_to_add')
                                ->label('Select Users')
                                ->options(function () {
                                    // Get users who DON'T have access yet
                                    $assignedUserIds = $this->record->users()->pluck('users.id')->toArray();
                                    
                                    return User::whereDoesntHave('roles', function ($query) {
                                            $query->where('name', 'super_admin');
                                        })
                                        ->whereNotIn('id', $assignedUserIds)
                                        ->orderBy('full_name')
                                        ->get()
                                        ->mapWithKeys(function ($user) {
                                            return [$user->id => ($user->full_name ?? $user->name) . ' (' . $user->email . ')'];
                                        })
                                        ->toArray();
                                })
                                ->searchable()
                                ->bulkToggleable()
                                ->columns(2)
                                ->helperText('Users will get permanent access to this theme'),
                        ]),

                    Forms\Components\Section::make('Remove Users')
                        ->description('Remove access from existing users')
                        ->schema([
                            Forms\Components\CheckboxList::make('users_to_remove')
                                ->label('Select Users to Remove')
                                ->options(function () {
                                    return $this->record->getAssignedUsers()
                                        ->mapWithKeys(function ($user) {
                                            return [$user->id => ($user->full_name ?? $user->name) . ' (' . $user->email . ')'];
                                        })
                                        ->toArray();
                                })
                                ->columns(2)
                                ->helperText('⚠️ Users will be switched to theme1 if they are currently using this theme'),
                        ]),
                ])
                ->action(function (array $data) {
                    // Add users
                    if (!empty($data['users_to_add'])) {
                        $this->record->assignToUser($data['users_to_add']);
                        
                        Notification::make()
                            ->title('Users Added Successfully')
                            ->body(count($data['users_to_add']) . ' user(s) granted access')
                            ->success()
                            ->send();
                    }

                    // Remove users
                    if (!empty($data['users_to_remove'])) {
                        $this->record->removeFromUser($data['users_to_remove']);
                        
                        Notification::make()
                            ->title('Users Removed Successfully')
                            ->body(count($data['users_to_remove']) . ' user(s) access revoked')
                            ->warning()
                            ->send();
                    }

                    if (empty($data['users_to_add']) && empty($data['users_to_remove'])) {
                        Notification::make()
                            ->title('No Changes Made')
                            ->body('Select users to add or remove')
                            ->info()
                            ->send();
                    }
                })
                ->modalSubmitActionLabel('Apply Changes'),

            // ========================================
            // DELETE ACTION
            // ========================================
            Actions\DeleteAction::make()
                ->before(function ($action) {
                    if ($this->record->slug === 'theme1') {
                        Notification::make()
                            ->title('Cannot Delete Default Theme')
                            ->body('theme1 is the system fallback and cannot be removed')
                            ->danger()
                            ->send();
                        
                        $action->cancel();
                    }
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Prevent deactivating theme1
        if ($this->record->slug === 'theme1' && !$data['is_active']) {
            $data['is_active'] = true;
            
            Notification::make()
                ->title('Cannot Deactivate Default Theme')
                ->body('theme1 must always remain active')
                ->warning()
                ->send();
        }

        return $data;
    }

    protected function afterSave(): void
    {
        // If ZIP was updated, extract it
        if ($this->record->wasChanged('zip_file_path') && $this->record->zip_file_path) {
            if ($this->record->extractZip()) {
                Notification::make()
                    ->title('Theme Files Extracted')
                    ->body('Components have been installed successfully')
                    ->success()
                    ->send();
            }
        }

        // If theme was deactivated, switch affected users
        if ($this->record->wasChanged('is_active') && !$this->record->is_active) {
            $affectedUsers = User::where('active_theme', $this->record->slug)->count();
            
            if ($affectedUsers > 0) {
                User::where('active_theme', $this->record->slug)
                    ->update(['active_theme' => 'theme1']);
                
                Notification::make()
                    ->title('Users Switched to Default Theme')
                    ->body("$affectedUsers user(s) were switched to theme1")
                    ->info()
                    ->send();
            }
        }
    }
}