<?php
// app/Filament/Resources/ThemeCommentsResource.php - NEW FILE

namespace App\Filament\Resources;

use App\Filament\Resources\ThemeCommentsResource\Pages;
use App\Models\ThemeComment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ThemeCommentsResource extends Resource
{
    protected static ?string $model = ThemeComment::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Theme Reviews';
    protected static ?string $navigationGroup = 'Super Admin';
    protected static ?int $navigationSort = 4;

    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Review Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('theme.name')
                            ->label('Theme')
                            ->icon('heroicon-o-paint-brush')
                            ->badge()
                            ->color('info'),

                        Infolists\Components\TextEntry::make('user.name')
                            ->label('User')
                            ->icon('heroicon-o-user')
                            ->badge()
                            ->color('success'),

                        Infolists\Components\TextEntry::make('rating')
                            ->label('Rating')
                            ->icon('heroicon-o-star')
                            ->badge()
                            ->color(fn ($state) => match(true) {
                                $state >= 4 => 'success',
                                $state >= 3 => 'warning',
                                default => 'danger',
                            })
                            ->formatStateUsing(fn ($state) => $state ? $state . ' / 5 ⭐' : 'Reply (No Rating)'),

                        Infolists\Components\TextEntry::make('parent.comment')
                            ->label('Reply To')
                            ->icon('heroicon-o-arrow-uturn-left')
                            ->visible(fn ($record) => $record->parent_id !== null)
                            ->limit(50),
                    ])->columns(2),

                Infolists\Components\Section::make('Comment Content')
                    ->schema([
                        Infolists\Components\TextEntry::make('comment')
                            ->label('')
                            ->columnSpanFull(),
                    ]),

                Infolists\Components\Section::make('Metadata')
                    ->schema([
                        Infolists\Components\TextEntry::make('category')
                            ->badge()
                            ->color('info'),

                        Infolists\Components\TextEntry::make('is_approved')
                            ->label('Status')
                            ->badge()
                            ->color(fn ($state) => $state ? 'success' : 'danger')
                            ->formatStateUsing(fn ($state) => $state ? 'Approved' : 'Pending'),

                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Posted')
                            ->dateTime('F j, Y \a\t g:i A')
                            ->icon('heroicon-o-clock'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('theme.name')
                    ->label('Theme')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-o-paint-brush'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('comment')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    }),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->badge()
                    ->color(fn ($state) => match(true) {
                        $state >= 4 => 'success',
                        $state >= 3 => 'warning',
                        $state === null => 'gray',
                        default => 'danger',
                    })
                    ->formatStateUsing(fn ($state) => $state ? $state . ' ⭐' : 'Reply')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                Tables\Columns\TextColumn::make('parent_id')
                    ->label('Type')
                    ->badge()
                    ->color(fn ($state) => $state ? 'warning' : 'success')
                    ->formatStateUsing(fn ($state) => $state ? 'Reply' : 'Review')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Posted')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('theme_id')
                    ->label('Theme')
                    ->relationship('theme', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('is_approved')
                    ->label('Approval Status')
                    ->boolean()
                    ->trueLabel('Approved')
                    ->falseLabel('Pending')
                    ->native(false),

                Tables\Filters\SelectFilter::make('rating')
                    ->options([
                        5 => '5 Stars',
                        4 => '4 Stars',
                        3 => '3 Stars',
                        2 => '2 Stars',
                        1 => '1 Star',
                    ])
                    ->label('Rating'),

                Tables\Filters\Filter::make('replies_only')
                    ->label('Replies Only')
                    ->query(fn ($query) => $query->whereNotNull('parent_id')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('heroicon-o-eye'),

                Tables\Actions\Action::make('toggle_approval')
                    ->label(fn ($record) => $record->is_approved ? 'Unapprove' : 'Approve')
                    ->icon(fn ($record) => $record->is_approved ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->is_approved ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['is_approved' => !$record->is_approved]);
                    })
                    ->successNotificationTitle(fn ($record) => 
                        $record->is_approved ? 'Comment approved' : 'Comment unapproved'
                    ),

                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Delete Comment')
                    ->modalDescription('This will also delete all replies to this comment.')
                    ->successNotificationTitle('Comment deleted'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('approve')
                        ->label('Approve Selected')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_approved' => true]))
                        ->successNotificationTitle('Comments approved'),

                    Tables\Actions\BulkAction::make('unapprove')
                        ->label('Unapprove Selected')
                        ->icon('heroicon-o-x-circle')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_approved' => false]))
                        ->successNotificationTitle('Comments unapproved'),

                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return false; // Comments are created via the public theme overview page
    }

    public static function canEdit($record): bool
    {
        return false; // Only approve/delete actions allowed
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListThemeComments::route('/'),
            'view' => Pages\ViewThemeComment::route('/{record}'),
        ];
    }
}