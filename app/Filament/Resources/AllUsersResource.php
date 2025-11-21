<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AllUsersResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class AllUsersResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'All Users';
    protected static ?string $navigationGroup = 'Super Admin';
    protected static ?int $navigationSort = 1;

    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    /**
     * ✅ CRITICAL: EXCLUDE any user who has super_admin role
     * Only show users who DON'T have super_admin role
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'super_admin');
            });
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Account Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Username'),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(User::class, 'email', ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->dehydrated(fn($state) => filled($state))
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->label('New Password')
                            ->hint('Leave blank to keep current'),
                    ])->columns(2),

                Forms\Components\Section::make('Profile Details')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->maxLength(1000),

                        Forms\Components\TextInput::make('phone')
                            ->tel(),

                        Forms\Components\TextInput::make('location')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Role Management')
                    ->schema([
                        Forms\Components\Select::make('roles')
                            ->label('User Role')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->required()
                            ->helperText('Assign user roles')
                            // ✅ EXCLUDE super_admin role from options
                            ->options(function () {
                                return \Spatie\Permission\Models\Role::where('name', '!=', 'super_admin')
                                    ->pluck('name', 'id');
                            }),

                        Forms\Components\Select::make('active_theme')
                            ->label('Active Theme')
                            ->options([
                                'theme1' => 'Theme 1',
                                'theme2' => 'Theme 2',
                                'theme3' => 'Theme 3',
                            ])
                            ->default('theme1'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                Tables\Columns\BadgeColumn::make('roles.name')
                    ->label('Role')
                    ->colors([
                        'warning' => 'premium_user',
                        'success' => 'free_user',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Joined')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->actions([
                // ✅ ONLY DELETE ACTION - NO EDIT BUTTON
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Delete User')
                    ->modalDescription('Are you sure you want to delete this user? This action cannot be undone.')
                    ->modalSubheading(fn ($record) => "User: {$record->name} ({$record->email})")
                    ->successNotificationTitle('User deleted successfully')
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Delete Selected Users')
                        ->modalDescription('Are you sure you want to delete these users? This action cannot be undone.')
                        ->successNotificationTitle('Users deleted successfully'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    /**
     * ✅ DISABLE CREATE - Users register through landing page
     */
    public static function canCreate(): bool
    {
        return false;
    }

    /**
     * ✅ DISABLE EDIT - Only delete allowed
     */
    public static function canEdit($record): bool
    {
        return false;
    }

    /**
     * ✅ Allow delete only for non-super-admin users
     */
    public static function canDelete($record): bool
    {
        return !$record->hasRole('super_admin');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAllUsers::route('/'),
            // ✅ No edit or create pages - only list view
        ];
    }
}