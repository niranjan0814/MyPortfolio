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
                            ->helperText('Assign user roles'),

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
                        'danger' => 'super_admin',
                        'warning' => 'premium_user',
                        'success' => 'free_user',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Joined')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAllUsers::route('/'),
            'create' => Pages\CreateAllUsers::route('/create'),
            'edit' => Pages\EditAllUsers::route('/{record}/edit'),
        ];
    }
}