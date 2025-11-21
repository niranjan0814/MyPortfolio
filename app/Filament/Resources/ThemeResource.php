<?php
// app/Filament/Resources/ThemeResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\ThemeResource\Pages;
use App\Models\Theme;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ThemeResource extends Resource
{
    protected static ?string $model = Theme::class;
    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';
    protected static ?string $navigationGroup = 'Theme Management';
    protected static ?string $navigationLabel = 'Themes';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Theme Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => 
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

                        Forms\Components\TextInput::make('version')
                            ->default('1.0.0')
                            ->maxLength(20)
                            ->helperText('Theme version number'),

                        Forms\Components\TextInput::make('author')
                            ->maxLength(255)
                            ->default(auth()->user()->full_name ?? auth()->user()->name),
                    ])->columns(2),

                Forms\Components\Section::make('Theme Files')
                    ->schema([
                        Forms\Components\FileUpload::make('zip_file_path')
                            ->label('Theme ZIP File')
                            ->acceptedFileTypes(['application/zip', 'application/x-zip-compressed'])
                            ->directory('themes/zips')
                            ->maxSize(10240) // 10MB
                            ->helperText('Upload theme as ZIP file (Max: 10MB)')
                            ->afterStateUpdated(function ($state, callable $set, $record) {
                                if ($state) {
                                    // Extract theme automatically
                                    static::extractTheme($state, $record ?? new Theme());
                                }
                            }),

                        Forms\Components\FileUpload::make('thumbnail_path')
                            ->label('Theme Thumbnail')
                            ->image()
                            ->directory('themes/thumbnails')
                            ->helperText('Preview image (recommended: 600x400px)'),
                    ]),

                Forms\Components\Section::make('Theme Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_premium')
                            ->label('Premium Theme')
                            ->helperText('Only premium users can access this theme')
                            ->default(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->helperText('Make theme available to users')
                            ->default(true),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order (lower number = first)'),
                    ])->columns(3),

                Forms\Components\Section::make('Theme Features')
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
                    ->description(fn ($record) => $record->slug),

                Tables\Columns\TextColumn::make('version')
                    ->badge()
                    ->color('info'),

                Tables\Columns\IconColumn::make('is_premium')
                    ->label('Premium')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-hand-thumb-up')
                    ->trueColor('warning')
                    ->falseColor('success'),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->onColor('success')
                    ->offColor('gray'),

                Tables\Columns\TextColumn::make('users_count')
                    ->counts('users')
                    ->label('Users')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Created By')
                    ->toggleable(),

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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route('portfolio.show', [
                        'user' => auth()->user()->slug,
                        'preview' => true,
                        'theme' => $record->slug,
                    ]))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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

    /**
     * Extract uploaded theme ZIP file
     */
    protected static function extractTheme($zipPath, Theme $theme): void
    {
        $fullPath = Storage::disk('public')->path($zipPath);
        $extractTo = resource_path('views/themes/' . ($theme->slug ?? Str::random(10)));

        $zip = new ZipArchive;
        if ($zip->open($fullPath) === TRUE) {
            $zip->extractTo($extractTo);
            $zip->close();
        }
    }

    /**
     * Only super admins can access
     */
    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }
}