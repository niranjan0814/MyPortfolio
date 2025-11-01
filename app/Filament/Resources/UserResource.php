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
use Illuminate\Support\Facades\Storage;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Users';
    protected static ?string $modelLabel = 'User';
    protected static ?int $navigationSort = 1;

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

                // === CV Upload Section ===
                Forms\Components\Section::make('Curriculum Vitae (CV)')
                    ->description('Upload your CV/Resume for download')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Forms\Components\FileUpload::make('cv_path')
                            ->label('Upload CV/Resume')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(5120) // 5MB max
                            ->directory('cvs')
                            ->downloadable()
                            ->openable()
                            ->previewable(false)
                            ->helperText('Upload your CV in PDF format (Max 5MB)')
                            ->columnSpanFull()
                            ->hint(fn ($record) => $record?->hasCv() ? '✓ CV uploaded' : 'No CV uploaded'),
                    ]),

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

                        Forms\Components\TextInput::make('profile_image')
                            ->label('Profile Image URL')
                            ->url()
                            ->placeholder('https://example.com/profile.jpg')
                            ->helperText('Enter a URL for your profile image'),
                    ])->columns(2),
            ]);
    }

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

                Tables\Columns\IconColumn::make('cv_uploaded')
                    ->label('CV')
                    ->boolean()
                    ->getStateUsing(fn ($record) => $record->hasCv())
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('location')
                    ->label('Location')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('has_cv')
                    ->label('Has CV')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('cv_path'),
                        false: fn ($query) => $query->whereNull('cv_path'),
                    ),
            ])
            ->actions([
                Tables\Actions\Action::make('download_cv')
                    ->label('Download CV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->visible(fn ($record) => $record->hasCv())
                    ->url(fn ($record) => route('cv.download', $record->id))
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->button(),

                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->button()
                    ->before(function ($record) {
                        // Delete CV file before deleting user
                        $record->deleteCv();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records) {
                            // Delete CV files before deleting users
                            foreach ($records as $record) {
                                $record->deleteCv();
                            }
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}