<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingPageContentResource\Pages;
use App\Models\LandingPageContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LandingPageContentResource extends Resource
{
    protected static ?string $model = LandingPageContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Super Admin';
    protected static ?string $navigationLabel = 'Landing Page Editor';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content Information')
                    ->schema([
                        Forms\Components\Select::make('section')
                            ->required()
                            ->options([
                                'hero' => '🎯 Hero Section',
                                'features' => '⚡ Features Section',
                                'themes' => '🎨 Themes Showcase',
                                'contact' => '📧 Contact Section',
                                'footer' => '🔗 Footer',
                            ])
                            ->reactive()
                            ->columnSpanFull()
                            ->helperText('Select which section of the landing page this content belongs to'),

                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Unique identifier (e.g., hero_title, feature_1_description)')
                            ->placeholder('hero_title')
                            ->unique(ignoreRecord: true),

                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'text' => 'Short Text',
                                'textarea' => 'Long Text / Paragraph',
                                'image' => 'Image URL',
                                'boolean' => 'Enable/Disable Toggle',
                            ])
                            ->default('text')
                            ->reactive()
                            ->helperText('Choose the type of content'),
                    ])->columns(2),

                Forms\Components\Section::make('Content Value')
                    ->schema([
                        // Text Input
                        Forms\Components\TextInput::make('value')
                            ->label('Content')
                            ->maxLength(65535)
                            ->visible(fn ($get) => $get('type') === 'text')
                            ->columnSpanFull()
                            ->placeholder('Enter text content')
                            ->required(fn ($get) => $get('type') === 'text'),

                        // Textarea
                        Forms\Components\Textarea::make('value')
                            ->label('Content')
                            ->rows(5)
                            ->visible(fn ($get) => $get('type') === 'textarea')
                            ->columnSpanFull()
                            ->placeholder('Enter paragraph or description')
                            ->required(fn ($get) => $get('type') === 'textarea'),

                        // Image URL
                        Forms\Components\TextInput::make('value')
                            ->label('Image URL')
                            ->url()
                            ->visible(fn ($get) => $get('type') === 'image')
                            ->columnSpanFull()
                            ->placeholder('https://example.com/image.jpg')
                            ->required(fn ($get) => $get('type') === 'image'),

                        // Boolean Toggle
                        Forms\Components\Toggle::make('value')
                            ->label('Enabled')
                            ->visible(fn ($get) => $get('type') === 'boolean')
                            ->inline(false)
                            ->default(true),

                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first')
                            ->label('Display Order'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section')
                    ->badge()
                    ->colors([
                        'primary' => 'hero',
                        'success' => 'features',
                        'warning' => 'themes',
                        'danger' => 'contact',
                        'secondary' => 'footer',
                    ])
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('medium')
                    ->description(fn ($record) => 'Type: ' . ucfirst($record->type)),

                Tables\Columns\TextColumn::make('value')
                    ->limit(60)
                    ->wrap()
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 60 ? $state : null;
                    })
                    ->formatStateUsing(function ($state, $record) {
                        if ($record->type === 'boolean') {
                            return $state ? '✅ Enabled' : '❌ Disabled';
                        }
                        return $state;
                    }),

                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('section', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('section')
                    ->options([
                        'hero' => 'Hero',
                        'features' => 'Features',
                        'themes' => 'Themes',
                        'contact' => 'Contact',
                        'footer' => 'Footer',
                    ])
                    ->label('Filter by Section'),

                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Textarea',
                        'image' => 'Image',
                        'boolean' => 'Boolean',
                    ])
                    ->label('Filter by Type'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->tooltip('Edit Content'),
                    
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Delete Content'),
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
            'index' => Pages\ListLandingPageContents::route('/'),
            'create' => Pages\CreateLandingPageContent::route('/create'),
            'edit' => Pages\EditLandingPageContent::route('/{record}/edit'),
        ];
    }

    /**
     * Only Super Admins can access this resource
     */
    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }
}