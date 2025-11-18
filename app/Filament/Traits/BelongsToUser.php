<?php
// app/Filament/Traits/BelongsToUser.php

namespace App\Filament\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BelongsToUser
{
    /**
     * Filter records to only show current user's data
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    /**
     * Automatically set user_id before create
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    /**
     * Ensure user_id is always set to current user before save
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    /**
     * Prevent users from editing other users' records
     */
    public static function canEdit($record): bool
    {
        return $record->user_id === auth()->id();
    }

    /**
     * Prevent users from deleting other users' records
     */
    public static function canDelete($record): bool
    {
        return $record->user_id === auth()->id();
    }

    /**
     * Prevent users from viewing other users' records
     */
    public static function canView($record): bool
    {
        return $record->user_id === auth()->id();
    }
}