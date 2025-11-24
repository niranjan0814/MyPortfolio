<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnquiryResource\Pages;
use App\Filament\Traits\BelongsToUser;
use App\Models\Enquiry;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class EnquiryResource extends Resource
{
    use BelongsToUser;

    protected static ?string $model = Enquiry::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Contact';
   

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make('Contact Information')
                ->schema([
                    Infolists\Components\TextEntry::make('name')
                        ->label('Name')
                        ->icon('heroicon-o-user'),
                    Infolists\Components\TextEntry::make('email')
                        ->label('Email')
                        ->icon('heroicon-o-envelope')
                        ->copyable(),
                    Infolists\Components\TextEntry::make('subject')
                        ->label('Subject')
                        ->icon('heroicon-o-chat-bubble-left-right'),
                ])->columns(3),
            
            Infolists\Components\Section::make('Message')
                ->schema([
                    Infolists\Components\TextEntry::make('message')
                        ->label('')
                        ->columnSpanFull(),
                ]),
            
            Infolists\Components\Section::make('Metadata')
                ->schema([
                    Infolists\Components\TextEntry::make('created_at')
                        ->label('Submitted At')
                        ->dateTime('F j, Y \a\t g:i A')
                        ->icon('heroicon-o-clock'),
                ])->columns(1),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('message')
                    ->limit(40)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 40) {
                            return null;
                        }
                        return $state;
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return false; // Read-only - created via contact form
    }

    public static function canEdit($record): bool
    {
        return false; // Read-only
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEnquiries::route('/'),
            'view' => Pages\ViewEnquiry::route('/{record}'),
        ];
    }
}
