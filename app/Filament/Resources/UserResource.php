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
use Filament\Notifications\Notification;

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
                                        
                                        $status = $theme->slug === 'theme1' ? ' (Default)' : '';
                                        return [$theme->slug => "{$theme->name}$status"];
                                    })
                                    ->toArray();
                            })
                            ->required()
                            ->live()
                            ->helperText(function ($record) {
                                if (!$record)
                                    return 'Select your portfolio design style';

                                $availableCount = $record->availableThemes()->count();
                                $totalThemes = \App\Models\Theme::active()->count();

                                if ($availableCount === $totalThemes) {
                                    return "You have access to all $totalThemes themes";
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

                        // Live Preview Button - Using Filament Actions
                        Forms\Components\Actions::make([
                            Forms\Components\Actions\Action::make('preview_theme')
                                ->label('Preview Selected Theme')
                                ->icon('heroicon-o-eye')
                                ->color('primary')
                                ->url(fn($record, $get) => $record 
                                    ? "/portfolio/{$record->slug}?preview=true&theme=" . ($get('active_theme') ?? $record->active_theme ?? 'theme1')
                                    : '#'
                                )
                                ->openUrlInNewTab()
                                ->extraAttributes(['class' => 'w-full sm:w-auto']),
                        ])
                            ->fullWidth()
                            ->label('Preview'),
                        
                        // Current theme indicator
                        Forms\Components\Placeholder::make('current_theme_indicator')
                            ->label('')
                            ->content(function ($record, $get) {
                                $selectedTheme = $get('active_theme') ?? $record?->active_theme ?? 'theme1';
                                $themeName = ucfirst(str_replace('_', ' ', $selectedTheme));
                                
                                return new \Illuminate\Support\HtmlString("
                                    <div class='space-y-2'>
                                        <div class='flex items-center gap-2 text-sm'>
                                            <span class='font-medium text-gray-700 dark:text-gray-300'>Currently Selected:</span>
                                            <span class='px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-md font-medium'>{$themeName}</span>
                                        </div>
                                        <p class='text-xs text-gray-500 dark:text-gray-400 flex items-start gap-2'>
                                            <svg class='w-4 h-4 mt-0.5 flex-shrink-0' fill='currentColor' viewBox='0 0 20 20'>
                                                <path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'/>
                                            </svg>
                                            <span>Click the preview button above to see how this theme looks. Changes preview instantly when you select a different theme!</span>
                                        </p>
                                    </div>
                                ");
                            })
                            ->live(),

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
                                $html .= '<h4 class="font-semibold text-green-900 mb-2"> Available Themes</h4>';
                                foreach ($available as $theme) {
                                   
                                    $html .= "<div class='flex items-center gap-2 text-sm text-green-700'>";
                                    $html .= "<span> {$theme->name}</span>";
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
                Forms\Components\Section::make('🖼️ Website Favicon')
                    ->description('Customize the icon that appears in browser tabs when visitors view your portfolio')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\FileUpload::make('favicon_path')
                            ->label('Upload Favicon')
                            ->image()
                            ->directory('favicons')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(1024) // 1MB max
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/svg+xml', 'image/x-icon'])
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('64')
                            ->imageResizeTargetHeight('64')
                            ->downloadable()
                            ->previewable()
                            ->helperText('Recommended: 64×64px PNG or ICO file. Max size: 1MB.')
                            ->hint(fn($record) => $record?->hasFavicon() ? '✓ Favicon uploaded' : 'No favicon uploaded')
                            ->hintColor(fn($record) => $record?->hasFavicon() ? 'success' : 'warning')
                            ->columnSpanFull(),
                        
                        Forms\Components\Placeholder::make('favicon_preview')
                            ->label('Current Favicon')
                            ->content(function ($record) {
                                if (!$record || !$record->hasFavicon()) {
                                    return new \Illuminate\Support\HtmlString(
                                        '<div class="flex items-center gap-3 text-sm text-gray-500">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Using default favicon</span>
                                        </div>'
                                    );
                                }
                                
                                return new \Illuminate\Support\HtmlString(
                                    '<div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                                            <img src="' . $record->favicon_url . '" alt="Favicon" class="w-8 h-8 object-contain">
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-900">Custom favicon active</p>
                                            <p class="text-xs text-gray-500">This will appear in browser tabs</p>
                                        </div>
                                    </div>'
                                );
                            })
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(false)
                    ->columns(1)
                    ->hidden(fn() => auth()->user()?->hasRole('super_admin')),
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