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
    protected static ?string $navigationLabel = 'My Profile';
    protected static ?string $modelLabel = 'My Profile';
    protected static ?int $navigationSort = 1;

    public static function canViewAny(): bool
    {
        return true; // Allow all authenticated users
    }

    // ✅ CRITICAL: Only show current user's profile
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();

        // Everyone only sees their own profile
        $query->where('id', auth()->id());

        return $query;
    }

    public static function form(Form $form): Form
    {
        $user = auth()->user();
        $isSuperAdmin = $user->hasRole('super_admin');

        return $form
            ->schema([
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
                            ->dehydrated(fn($state) => filled($state))
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->maxLength(255),
                    ])->columns(2),

                // ✅ ONLY show Profile Details section if NOT super admin
                Forms\Components\Section::make('Profile Details')
                    ->description('Personal information displayed on your portfolio')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('John Doe'),

                        Forms\Components\Textarea::make('description')
                            ->label('Bio / Description')
                            ->rows(4)
                            ->maxLength(1000)
                            ->placeholder('Full-Stack Developer...'),

                        Forms\Components\TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel()
                            ->placeholder('+1 234 567 8900'),

                        Forms\Components\TextInput::make('location')
                            ->label('Location')
                            ->maxLength(255)
                            ->placeholder('New York, USA'),

                        Forms\Components\Textarea::make('address')
                            ->label('Full Address')
                            ->rows(2)
                            ->maxLength(500)
                            ->placeholder('123 Main St, City, Country'),
                    ])
                    ->columns(2)
                    ->hidden($isSuperAdmin), // ✅ Hide for super admin

                Forms\Components\Section::make('Curriculum Vitae (CV)')
                    ->description('Upload your CV/Resume for download')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Forms\Components\FileUpload::make('cv_path')
                            ->label('Upload CV/Resume')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(5120)
                            ->directory('cvs')
                            ->downloadable()
                            ->openable()
                            ->previewable(false)
                            ->helperText('Upload your CV in PDF format (Max 5MB)')
                            ->columnSpanFull()
                            ->hint(fn($record) => $record?->hasCv() ? '✓ CV uploaded' : 'No CV uploaded'),
                    ])
                    ->hidden($isSuperAdmin), // ✅ Hide for super admin

                Forms\Components\Section::make('Social & Links')
                    ->description('Your online presence')
                    ->icon('heroicon-o-link')
                    ->schema([
                        Forms\Components\TextInput::make('github_url')
                            ->label('GitHub URL')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('github.com/username'),

                        Forms\Components\TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->prefix('https://')
                            ->placeholder('linkedin.com/in/username'),

                        Forms\Components\TextInput::make('profile_image')
                            ->label('Profile Image URL')
                            ->url()
                            ->placeholder('https://example.com/profile.jpg')
                            ->helperText('Enter a URL for your profile image'),
                    ])
                    ->columns(2)
                    ->hidden($isSuperAdmin), // ✅ Hide for super admin

                Forms\Components\Section::make('🎨 Portfolio Theme')
                    ->description('Choose how your portfolio looks')
                    ->schema([
                        Forms\Components\Select::make('active_theme')
                            ->label('Active Theme')
                            ->options(function ($record) {
                                if (!$record) {
                                    return ['theme1' => '🎨 Theme 1 (Default)'];
                                }

                                return $record->availableThemes()
                                    ->mapWithKeys(function ($theme) {
                                        $icon = $theme->is_premium ? '💎' : '🎨';
                                        $status = $theme->slug === 'theme1' ? ' (Default)' : '';
                                        return [$theme->slug => "$icon {$theme->name}$status"];
                                    })
                                    ->toArray();
                            })
                            ->required()
                            ->reactive()
                            ->helperText(function ($record) {
                                if (!$record)
                                    return 'Select your portfolio design style';

                                $availableCount = $record->availableThemes()->count();
                                $totalThemes = \App\Models\Theme::active()->count();

                                if ($availableCount === $totalThemes) {
                                    return "✅ You have access to all $totalThemes themes";
                                }

                                return "You have access to $availableCount out of $totalThemes themes";
                            })
                            ->afterStateUpdated(function ($state, $record) {
                                if ($record && !$record->canAccessTheme($state)) {
                                    Notification::make()
                                        ->title('Access Denied')
                                        ->body('You don\'t have access to this theme. Switched to default.')
                                        ->warning()
                                        ->send();

                                    return 'theme1';
                                }
                            }),

                        // Preview Button
                        Forms\Components\Placeholder::make('preview')
                            ->label('')
                            ->content(fn($record) => new \Illuminate\Support\HtmlString(
                                '<div class="space-y-4">' .
                                '<a href="/portfolio/' . ($record?->slug ?? 'preview') . '?preview=true&theme=' . ($record?->active_theme ?? 'theme1') . '" target="_blank" 
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    🔍 Preview Current Theme
                </a>' .
                                '</div>'
                            )),

                        // Theme Access Info (Show available vs locked themes)
                        Forms\Components\Placeholder::make('theme_access_info')
                            ->label('Theme Access')
                            ->content(function ($record) {
                                if (!$record) {
                                    return 'Available themes will appear after registration';
                                }

                                $available = $record->availableThemes();
                                $allThemes = \App\Models\Theme::active()->get();
                                $locked = $allThemes->whereNotIn('slug', $available->pluck('slug'));

                                $html = '<div class="space-y-3">';

                                // Available Themes
                                $html .= '<div class="bg-green-50 border border-green-200 rounded-lg p-3">';
                                $html .= '<h4 class="font-semibold text-green-900 mb-2">✅ Available Themes</h4>';
                                foreach ($available as $theme) {
                                    $icon = $theme->is_premium ? '💎' : '🎨';
                                    $html .= "<div class='flex items-center gap-2 text-sm text-green-700'>";
                                    $html .= "<span>$icon {$theme->name}</span>";
                                    $html .= "</div>";
                                }
                                $html .= '</div>';

                                // Locked Themes
                                if ($locked->isNotEmpty()) {
                                    $html .= '<div class="bg-gray-50 border border-gray-200 rounded-lg p-3">';
                                    $html .= '<h4 class="font-semibold text-gray-900 mb-2">🔒 Locked Themes</h4>';
                                    foreach ($locked as $theme) {
                                        $html .= "<div class='flex items-center gap-2 text-sm text-gray-600'>";
                                        $html .= "<span>💎 {$theme->name}</span>";
                                        $html .= "<span class='text-xs text-gray-500'>(Premium)</span>";
                                        $html .= "</div>";
                                    }
                                    $html .= '<p class="text-xs text-gray-500 mt-2">Contact admin for premium access</p>';
                                    $html .= '</div>';
                                }

                                $html .= '</div>';

                                return new \Illuminate\Support\HtmlString($html);
                            }),
                    ])
                    ->collapsible()
                    ->collapsed(false)
                    ->hidden(fn() => auth()->user()?->hasRole('super_admin')), // ✅ Hide for super admin
                Forms\Components\Section::make('Website Favicon')
                    ->description('Upload the browser tab icon')
                    ->schema([
                        Forms\Components\FileUpload::make('favicon_path')
                            ->label('Upload Favicon')
                            ->image()
                            ->directory('favicons')
                            ->visibility('public')
                            ->maxSize(1024)
                            ->helperText('Recommended size: 64×64px PNG'),
                    ])
                    
                    ->columns(1),

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
                    ->getStateUsing(fn($record) => $record->hasCv())
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->hidden(fn() => auth()->user()?->hasRole('super_admin')),
            ])
            ->actions([
                Tables\Actions\Action::make('download_cv')
                    ->label('Download CV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->visible(fn($record) => $record->hasCv())
                    ->url(fn($record) => route('cv.download', $record->id))
                    ->openUrlInNewTab()
                    ->hidden(fn() => auth()->user()?->hasRole('super_admin')),

                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->button(),
            ])
            ->bulkActions([]) // Disable bulk actions for security
            ->defaultSort('created_at', 'desc');
    }

    public static function canCreate(): bool
    {
        return false; // Prevent creating new users from panel
    }

    public static function canDelete($record): bool
    {
        return false; // Prevent self-deletion
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}