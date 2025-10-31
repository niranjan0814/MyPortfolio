<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Users';
    protected static ?string $modelLabel = 'User';
    protected static ?int $navigationSort = 1;

    /* ------------------------------------------------------------------ */
    /*  FORM – Basic + Profile + Social Links                             */
    /* ------------------------------------------------------------------ */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // === Account Section ===
                Forms\Components\Section::make('Account Information')
                    ->description('Login credentials and basic info')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Username'),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(User::class, 'email', ignoreRecord: true)
                            ->maxLength(255)
                            ->label('Email Address'),

                        Forms\Components\TextInput::make('password')
                            ->label('New Password')
                            ->password()
                            ->revealable()
                            ->hint('Leave blank to keep current password')
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->maxLength(255),
                    ])->columns(2),

                // === Profile Section ===
                Forms\Components\Section::make('Profile Details')
                    ->description('Personal information displayed on your portfolio')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Niranjan Sivarasa'),

                        Forms\Components\Textarea::make('description')
                            ->label('Bio / Description')
                            ->rows(4)
                            ->maxLength(1000)
                            ->placeholder('Full-Stack Developer specializing in MERN Stack...'),

                        Forms\Components\TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel()
                            ->mask('+94 99 999 9999')
                            ->placeholder('+94 76 423 1394'),

                        Forms\Components\TextInput::make('location')
                            ->label('Location')
                            ->maxLength(255)
                            ->placeholder('Jaffna, Sri Lanka'),

                        Forms\Components\Textarea::make('address')
                            ->label('Full Address')
                            ->rows(2)
                            ->maxLength(500)
                            ->placeholder('No. 424/11, K.K.S. Road, Jaffna, Sri Lanka'),
                    ])->columns(2),

                // === Social Links Section ===
                Forms\Components\Section::make('Social & Links')
                    ->description('Your online presence')
                    ->icon('heroicon-o-link')
                    ->schema([
                        Forms\Components\TextInput::make('github_url')
                            ->label('GitHub URL')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('github.com/niranjan0814'),

                        Forms\Components\TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('linkedin.com/in/niranjan-sivarasa-56ba57366'),

                        Forms\Components\TextInput::make('profile_image') // Ensure this is correctly placed
                            ->label('Profile Image URL')
                            ->url()
                            ->placeholder('https://example.com/profile.jpg')
                            ->helperText('Enter a URL for your profile image'),
                    ])->columns(2),
            ]);
    }

    /* ------------------------------------------------------------------ */
    /*  TABLE – List of users with profile preview                        */
    /* ------------------------------------------------------------------ */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Username')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-envelope'),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('location')
                    ->label('Location')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\BadgeColumn::make('social_links')
                    ->label('Social')
                    ->getStateUsing(fn ($record) => collect([
                        $record->github_url ? 'GitHub' : null,
                        $record->linkedin_url ? 'LinkedIn' : null,
                    ])->filter()->implode(', '))
                    ->colors([
                        'success' => 'GitHub',
                        'primary' => 'LinkedIn',
                    ])
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('profile_image') // Added to table
                    ->label('Profile Image')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime('M j, Y')
                    ->label('Verified')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('has_github')
                    ->label('Has GitHub')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('github_url'),
                        false: fn ($query) => $query->whereNull('github_url'),
                    ),
                Tables\Filters\TernaryFilter::make('has_linkedin')
                    ->label('Has LinkedIn')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('linkedin_url'),
                        false: fn ($query) => $query->whereNull('linkedin_url'),
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->button(),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    /* ------------------------------------------------------------------ */
    /*  PAGES                                                            */
    /* ------------------------------------------------------------------ */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}