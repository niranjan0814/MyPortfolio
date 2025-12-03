<?php
// app/Filament/Resources/ThemeResource.php - FULLY ENHANCED VERSION

namespace App\Filament\Resources;

use App\Filament\Resources\ThemeResource\Pages;
use App\Models\Theme;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class ThemeResource extends Resource
{
    protected static ?string $model = Theme::class;
    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';
    protected static ?string $navigationGroup = 'Super Admin';
    protected static ?string $navigationLabel = 'Themes';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // ========================================
                // SECTION 1: THEME INFORMATION
                // ========================================
                Forms\Components\Section::make('🎨 Theme Information')
                    ->description('Basic details about your theme')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            )
                            ->helperText('e.g., "Modern Professional"'),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('URL-friendly identifier (auto-generated)')
                            ->disabled()
                            ->dehydrated(),

                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Brief description of the theme'),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('version')
                                    ->default('1.0.0')
                                    ->maxLength(20)
                                    ->helperText('Theme version number'),

                                Forms\Components\TextInput::make('author')
                                    ->maxLength(255)
                                    ->default(auth()->user()->full_name ?? auth()->user()->name),
                            ]),
                    ])->columns(2),

                // ========================================
                // SECTION 2: THEME FILES
                // ========================================
                Forms\Components\Section::make('📦 Theme Files')
                    ->description('Upload and manage theme files')
                    ->schema([
                        Forms\Components\TextInput::make('component_path')
                            ->label('Directory Name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Folder name in resources/views/components (e.g., "theme1", "theme2")')
                            ->default(fn ($state) => $state ?? 'theme' . (Theme::count() + 1)),

                        Forms\Components\FileUpload::make('zip_file_path')
                            ->label('Theme ZIP File')
                            ->acceptedFileTypes(['application/zip', 'application/x-zip-compressed'])
                            ->directory('themes/zips')
                            ->disk('public')  // ✅ ADD THIS
                            ->visibility('public')  // ✅ ADD THIS
                            ->maxSize(10240)
                            ->downloadable()  // ✅ ADD THIS - allows viewing uploaded file
                            ->openable()  // ✅ ADD THIS - allows opening uploaded file
                            ->helperText('Upload theme as ZIP file (Max: 10MB). Must contain all required components.')
                            ->afterStateUpdated(function ($state, $set, $record) {
                                if ($state && $record) {
                                    try {
                                        $zipPath = Storage::disk('public')->path($state);
                                        $missing = Theme::validateZip($zipPath);

                                        if (!empty($missing)) {
                                            Notification::make()
                                                ->title('Invalid ZIP File')
                                                ->body('Missing components: ' . implode(', ', $missing))
                                                ->danger()
                                                ->send();

                                            $set('zip_file_path', null);
                                        } else {
                                            Notification::make()
                                                ->title('ZIP Validated Successfully')
                                                ->body('All required components found')
                                                ->success()
                                                ->send();
                                        }
                                    } catch (\Exception $e) {
                                        Notification::make()
                                            ->title('Validation Error')
                                            ->body($e->getMessage())
                                            ->danger()
                                            ->send();
                                    }
                                }
                            }),

                        Forms\Components\FileUpload::make('thumbnail_path')
                            ->label('Theme Thumbnail')
                            ->image()
                            ->directory('themes/thumbnails')
                            ->helperText('Preview image (recommended: 600x400px)'),

                        Forms\Components\Placeholder::make('component_status')
                            ->label('Component Status')
                            ->content(function ($record) {
                                if (!$record) {
                                    return 'Upload ZIP to check components';
                                }

                                return $record->componentsExist()
                                    ? '✅ All components installed'
                                    : '⚠️ Some components missing - upload ZIP to fix';
                            }),
                    ]),

                // ========================================
                // SECTION 3: THEME SETTINGS
                // ========================================
                Forms\Components\Section::make('⚙️ Theme Settings')
                    ->description('Configure theme availability and features')
                    ->schema([
                        Forms\Components\Toggle::make('is_premium')
                            ->label('Premium Theme')
                            ->helperText('Only users with premium access can use this theme')
                            ->default(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->helperText('Make theme available to users')
                            ->default(true)
                            ->disabled(fn($record) => $record && $record->slug === 'theme1')
                            ->hint(fn($record) => $record && $record->slug === 'theme1' ? '⚠️ Default theme cannot be deactivated' : ''),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order (lower number = first)'),
                    ])->columns(3),

                // ========================================
                // SECTION 4: THEME FEATURES
                // ========================================
                Forms\Components\Section::make('✨ Theme Features')
                    ->description('Define theme characteristics and color scheme')
                    ->schema([
                        Forms\Components\TagsInput::make('features')
                            ->label('Key Features')
                            ->placeholder('Add feature and press Enter')
                            ->helperText('e.g., "Dark Mode", "Responsive Design"')
                            ->suggestions([
                                'Dark Mode Support',
                                'Mobile Responsive',
                                'SEO Optimized',
                                'Fast Loading',
                                'Glassmorphism Effects',
                                'Smooth Animations',
                            ]),

                        Forms\Components\KeyValue::make('colors')
                            ->label('Color Scheme')
                            ->keyLabel('Color Name')
                            ->valueLabel('Hex Code')
                            ->helperText('Define theme color palette')
                            ->default([
                                'primary' => '#3B82F6',
                                'secondary' => '#8B5CF6',
                                'accent' => '#F59E0B',
                            ]),
                    ]),

                Forms\Components\Hidden::make('created_by')
                    ->default(auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_path')
                    ->label('Preview')
                    ->square()
                    ->size(60),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn($record) => $record->slug),

                Tables\Columns\TextColumn::make('version')
                    ->badge()
                    ->color('info'),

                Tables\Columns\IconColumn::make('is_premium')
                    ->label('Type')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-hand-thumb-up')
                    ->trueColor('warning')
                    ->falseColor('success')
                    ->tooltip(fn($record) => $record->is_premium ? 'Premium' : 'Free'),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->onColor('success')
                    ->offColor('gray')
                    ->disabled(fn($record) => $record->slug === 'theme1')
                    ->beforeStateUpdated(function ($record, $state) {
                        if ($record->slug === 'theme1' && !$state) {
                            Notification::make()
                                ->title('Cannot Deactivate Default Theme')
                                ->body('theme1 must always remain active as the fallback')
                                ->danger()
                                ->send();
                            return false;
                        }
                    }),

                Tables\Columns\TextColumn::make('users_count')
                    ->counts('users')
                    ->label('Users')
                    ->badge()
                    ->color('primary')
                    ->tooltip('Number of users with access'),

                

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_premium')
                    ->label('Premium Only')
                    ->boolean()
                    ->trueLabel('Premium')
                    ->falseLabel('Free')
                    ->native(false),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Only')
                    ->boolean()
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn($record) => route('portfolio.show', [
                        'user' => auth()->user()->slug,
                        'preview' => true,
                        'theme' => $record->slug,
                    ]))
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil')
                    ->color('warning'),

                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->before(function ($record, $action) {
                        if ($record->slug === 'theme1') {
                            Notification::make()
                                ->title('Cannot Delete Default Theme')
                                ->body('theme1 is the system fallback and cannot be removed')
                                ->danger()
                                ->send();

                            $action->cancel();
                        }
                    }),
                Tables\Actions\Action::make('download_zip')
                    ->label('Download ZIP')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->visible(fn($record) => !empty($record->zip_file_path))
                    ->action(function ($record) {
                        $zipPath = Storage::disk('public')->path($record->zip_file_path);

                        if (!file_exists($zipPath)) {
                            Notification::make()
                                ->title('ZIP File Missing')
                                ->body('The theme ZIP file could not be found.')
                                ->danger()
                                ->send();
                            return;
                        }

                        return response()->download(
                            $zipPath,
                            $record->slug . '-v' . $record->version . '.zip'
                        );
                    }),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records, $action) {
                            if ($records->contains('slug', 'theme1')) {
                                Notification::make()
                                    ->title('Cannot Delete Default Theme')
                                    ->body('theme1 cannot be deleted')
                                    ->danger()
                                    ->send();

                                $action->cancel();
                            }
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListThemes::route('/'),
            'create' => Pages\CreateTheme::route('/create'),
            'edit' => Pages\EditTheme::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    // ✅ ADD THESE METHODS
    public static function canEdit($record): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    public static function canDelete($record): bool
    {
        // Don't allow deleting theme1
        if ($record->slug === 'theme1') {
            return false;
        }
        return auth()->user()?->hasRole('super_admin') ?? false;
    }
}