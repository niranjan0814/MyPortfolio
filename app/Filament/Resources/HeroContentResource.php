<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroContentResource\Pages;
use App\Models\HeroContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Closure as BaseClosure;

class HeroContentResource extends Resource
{
    protected static ?string $model = HeroContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Portfolio';
    protected static ?string $navigationLabel = 'Hero Section';
    protected static ?int $navigationSort = 1;
    public static function canViewAny(): bool
    {
        return !auth()->user()?->hasRole('super_admin');
    }

    public static function form(Form $form): Form
    {
        $user = auth()->user();

        return $form->schema([
            Forms\Components\Hidden::make('user_id')
                ->default(fn () => auth()->id()),


            // ── HERO TEXT ───────────────────────────────────────
            Forms\Components\Section::make('Hero Text')
                ->schema([
                    Forms\Components\TextInput::make('greeting')
                        ->label('Greeting')
                        ->default("Hi, I'm")
                        ->placeholder("Hi, I'm"),


Forms\Components\RichEditor::make('description')
    ->label('Description')
    ->toolbarButtons(['bold', 'italic', 'link', 'bulletList'])
    ->default("I'm {$user->name}, a passionate developer.")
    ->placeholder('Transforming ideas into elegant, scalable digital solutions...')
    ->rule(function () {
        return function (string $attribute, $value, BaseClosure $fail) {
            $wordCount = str_word_count(strip_tags($value));

            if ($wordCount > 30) {
                $fail("The {$attribute} must not exceed 30 words. (Currently: {$wordCount})");
            }
        };
    }),



                    Forms\Components\Repeater::make('typing_texts')
                        ->label('Typing Animation Texts')
                        ->schema([
                            Forms\Components\TextInput::make('text')
                                ->label('Text')
                                ->required()
                                ->placeholder('Full-Stack Developer'),
                        ])
                        ->defaultItems(3)
                        ->maxItems(6)
                        ->collapsible()
                        ->cloneable()
                        ->helperText('Texts that rotate in typing animation'),
                ])->columns(1),

            // ── CTA BUTTONS ─────────────────────────────────────
            Forms\Components\Section::make('Call-to-Action Buttons')
                ->schema([
                    Forms\Components\Toggle::make('btn_contact_enabled')
                        ->label('Enable "Get In Touch" Button')
                        ->default(true)
                        ->reactive(),

                    Forms\Components\TextInput::make('btn_contact_text')
                        ->label('Button Text')
                        ->default('Get In Touch')
                        ->visible(fn ($get) => $get('btn_contact_enabled')),

                    Forms\Components\Toggle::make('btn_projects_enabled')
                        ->label('Enable "View My Work" Button')
                        ->default(true)
                        ->reactive(),

                    Forms\Components\TextInput::make('btn_projects_text')
                        ->label('Button Text')
                        ->default('View My Work')
                        ->visible(fn ($get) => $get('btn_projects_enabled')),
                ])->columns(2),

            // ── SOCIAL LINKS ────────────────────────────────────
            Forms\Components\Section::make('Social Links')
                ->schema([
                    Forms\Components\Repeater::make('social_links')
                        ->label('Social Profiles')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Platform')
                                ->required()
                                ->placeholder('GitHub'),

                            Forms\Components\TextInput::make('url')
                                ->label('Profile URL')
                                ->url()
                                ->required()
                                ->placeholder('https://github.com/username'),

                            Forms\Components\TextInput::make('icon')
                                ->label('Icon URL')
                                ->url()
                                ->placeholder('https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg'),

                            
                        ])
                        ->defaultItems(3)
                        ->maxItems(6)
                        ->collapsible()
                        ->cloneable()
                        ->columns(2),
                ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('greeting')->limit(20),
                Tables\Columns\BadgeColumn::make('btn_contact_enabled')
                    ->label('Contact Btn')
                    ->colors(['success' => true, 'danger' => false])
                    ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No'),
                Tables\Columns\BadgeColumn::make('btn_projects_enabled')
                    ->label('Projects Btn')
                    ->colors(['success' => true, 'danger' => false])
                    ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No'),
                Tables\Columns\TextColumn::make('social_links')
                    ->label('Social Links')
                    ->getStateUsing(fn ($record) => $record->social_links ? count($record->social_links) : 0),
                Tables\Columns\TextColumn::make('tech_stack_count')->default('—'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('btn_contact_enabled'),
                Tables\Filters\TernaryFilter::make('btn_projects_enabled'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
}