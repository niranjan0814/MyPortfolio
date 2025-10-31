<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroContentResource\Pages;
use App\Models\HeroContent;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Support\Str;

class HeroContentResource extends Resource
{
    protected static ?string $model = HeroContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationLabel = 'Hero Section';
    protected static ?int $navigationSort = 1;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Content Information')
                ->schema([
                    Forms\Components\Select::make('key')
                        ->required()
                        ->options([
                            'greeting'               => 'Greeting Text (before name)',
                            'description'            => 'Description Text',
                            'typing_text_1'          => 'Typing Text 1',
                            'typing_text_2'          => 'Typing Text 2',
                            'typing_text_3'          => 'Typing Text 3',
                            'typing_text_4'          => 'Typing Text 4',
                            'typing_text_5'          => 'Typing Text 5',
                            'btn_contact_enabled'    => 'Enable "Get In Touch" Button',
                            'btn_contact_text'       => '"Get In Touch" Button Text',
                            'btn_projects_enabled'   => 'Enable "View My Work" Button',
                            'btn_projects_text'      => '"View My Work" Button Text',
                            'social_link_1'          => 'Social Link 1',
                            'social_link_2'          => 'Social Link 2',
                            'social_link_3'          => 'Social Link 3',
                            'social_link_4'          => 'Social Link 4',
                            'social_link_5'          => 'Social Link 5',
                            'tech_stack_enabled'     => 'Show Tech Stack Preview',
                            'tech_stack_count'       => 'Number of Tech Stack Icons to Show',
                        ])
                        ->searchable()
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set) => static::updateType($state, $set))
                        ->helperText('Select the content field you want to manage')
                        ->columnSpanFull(),

                    Forms\Components\Hidden::make('type')
                        ->reactive()
                        ->default('text'),

                    Forms\Components\TextInput::make('order')
                        ->numeric()
                        ->default(0)
                        ->label('Display Order')
                        ->helperText('Lower numbers appear first')
                        ->visible(fn ($get) => Str::startsWith($get('key') ?? '', 'typing_text_')),
                ])->columns(2),

            Forms\Components\Section::make('Content Value')
                ->schema([
                    // Text Input
                    Forms\Components\TextInput::make('value')
                        ->label('Value')
                        ->required()
                        ->maxLength(255)
                        ->visible(fn ($get) => in_array($get('type'), ['text', 'number'])),

                    // Textarea
                    Forms\Components\Textarea::make('value')
                        ->label('Value')
                        ->required()
                        ->rows(5)
                        ->visible(fn ($get) => $get('type') === 'textarea'),

                    // Boolean Toggle
                    Forms\Components\Toggle::make('value')
                        ->label('Enabled')
                        ->onColor('success')
                        ->offColor('danger')
                        ->required()
                        ->visible(fn ($get) => $get('type') === 'boolean'),

                    // JSON Social Link Fields
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('social_name')
                                ->label('Platform Name')
                                ->placeholder('GitHub')
                                ->required(),
                            Forms\Components\TextInput::make('social_url')
                                ->label('Profile URL')
                                ->url()
                                ->placeholder('https://github.com/username')
                                ->required(),
                            Forms\Components\TextInput::make('social_icon')
                                ->label('Icon URL')
                                ->url()
                                ->placeholder('https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg')
                                ->required(),
                            Forms\Components\ColorPicker::make('social_color')
                                ->label('Hover Border Color')
                                ->default('#3b82f6'),
                        ])
                        ->visible(fn ($get) => $get('type') === 'json')
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('description')
                        ->label('Admin Description')
                        ->helperText('Optional: Describe what this content is used for')
                        ->rows(2)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->formatStateUsing(fn ($state) => ucwords(str_replace('_', ' ', $state)))
                    ->copyable(),

                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'text',
                        'success' => 'boolean',
                        'warning' => 'textarea',
                        'info'    => 'json',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->formatStateUsing(function ($state, $record) {
                        return match ($record->type) {
                            'boolean' => $state ? 'Enabled' : 'Disabled',
                            'json'    => ($data = json_decode($state, true)) ? ($data['name'] ?? 'Link') : 'Invalid',
                            default   => $state,
                        };
                    })
                    ->tooltip(fn ($column) => strlen($column->getState()) > 50 ? $column->getState() : null),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M j, Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('key')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'text'     => 'Text',
                        'textarea' => 'Text Area',
                        'boolean'  => 'Boolean',
                        'json'     => 'Social Links',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index'  => Pages\ListHeroContents::route('/'),
            'create' => Pages\CreateHeroContent::route('/create'),
            'edit'   => Pages\EditHeroContent::route('/{record}/edit'),
        ];
    }

    // Auto-set type based on key
    protected static function updateType($key, callable $set): void
    {
        if (!$key) return;

        $type = match (true) {
            str_contains($key, '_enabled') => 'boolean',
            $key === 'description'         => 'textarea',
            str_contains($key, 'social_link_') => 'json',
            $key === 'tech_stack_count'    => 'number',
            default                        => 'text',
        };

        $set('type', $type);
    }

    // Save JSON & boolean correctly
    public static function mutateFormDataBeforeCreate(array $data): array
    {
        return static::processData($data);
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        return static::processData($data);
    }

    private static function processData(array $data): array
    {
        // Handle JSON social links
        if (($data['type'] ?? '') === 'json') {
            $data['value'] = json_encode([
                'name'  => $data['social_name'] ?? '',
                'url'   => $data['social_url'] ?? '',
                'icon'  => $data['social_icon'] ?? '',
                'color' => $data['social_color'] ?? '#3b82f6',
            ]);
            unset($data['social_name'], $data['social_url'], $data['social_icon'], $data['social_color']);
        }

        // Convert boolean toggle
        if (($data['type'] ?? '') === 'boolean') {
            $data['value'] = $data['value'] ? '1' : '0';
        }

        // Ensure tech_stack_count is integer
        if ($data['key'] === 'tech_stack_count') {
            $data['value'] = (string) (int) ($data['value'] ?? 4);
        }

        return $data;
    }
}