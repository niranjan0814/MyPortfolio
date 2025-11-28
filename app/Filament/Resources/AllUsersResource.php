<?php
// app/Filament/Resources/AllUsersResource.php - FIXED VERSION

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
     * ✅ CRITICAL: EXCLUDE super_admins from the list
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
                // ✅ FIXED: Role Management Section
                Forms\Components\Section::make('Role Management')
                    ->schema([
                        Forms\Components\Select::make('roles')
                            ->label('User Role')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->required()
                            ->helperText('⚠️ Assign free_user or premium_user role')
                            // ✅ EXCLUDE super_admin from options
                            ->options(function () {
                                return \Spatie\Permission\Models\Role::where('name', '!=', 'super_admin')
                                    ->pluck('name', 'id');
                            }),

                        Forms\Components\Select::make('active_theme')
                            ->label('Active Theme')
                            ->options(function () {
                                return \App\Models\Theme::where('is_active', true)
                                    ->pluck('name', 'slug');
                            })
                            ->default('theme1')
                            ->helperText('Set user\'s current active theme'),
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
                    ])
                    ->formatStateUsing(fn ($state) => ucfirst(str_replace('_', ' ', $state))),

                Tables\Columns\TextColumn::make('active_theme')
                    ->label('Theme')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Joined')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->actions([
                // ✅ NOW WE HAVE EDIT ACTION
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->color('warning'),

                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Delete User')
                    ->modalDescription('Are you sure you want to delete this user? This action cannot be undone.')
                    ->successNotificationTitle('User deleted successfully')
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
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
     * ✅ NOW ALLOW EDIT for Super Admins
     */
    public static function canEdit($record): bool
    {
        // Super admins can edit any non-super-admin user
        return auth()->user()?->hasRole('super_admin') && !$record->hasRole('super_admin');
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
            'edit' => Pages\EditAllUsers::route('/{record}/edit'), // ✅ RE-ENABLE EDIT PAGE
        ];
    }
}