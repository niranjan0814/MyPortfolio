<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Closure as BaseClosure;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Portfolio';
    protected static ?string $navigationLabel = 'About Content';
    public static function canViewAny(): bool
    {
        return !auth()->user()?->hasRole('super_admin');
    }
    public static function form(Form $form): Form
    {
        $user = auth()->user();

        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn () => auth()->id()),

                Forms\Components\Section::make('General Information')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make([
                            'default' => 1,
                            'sm' => 2,
                        ])
                            ->schema([
                                Forms\Components\TextInput::make('about_greeting')
                                    ->label('Greeting')
                                    ->default(fn () => "Hi, I'm " . ($user->name ?? 'User') . "!")
                                    ->placeholder("Hi, I'm Niranjan!"),

                                Forms\Components\TextInput::make('profile_name')
                                    ->label('Profile Name')
                                    ->default($user->name ?? '')
                                    ->placeholder('Niranjan Sivarasa'),
                            ]),

                        Forms\Components\RichEditor::make('about_description')
    ->label('Description')
    ->toolbarButtons(['bold', 'italic', 'link', 'bulletList', 'orderedList'])
    ->default("I'm {$user->name}, a passionate Software Engineering undergraduate at SLIIT.")
    ->placeholder('Driven and innovative undergraduate specializing in Software Engineering...')
    ->rule(function () {
        return function (string $attribute, $value, BaseClosure $fail) {
            // Remove HTML tags added by RichEditor
            $cleanText = strip_tags($value);

            // Count words
            $wordCount = str_word_count($cleanText);

            // Limit: 33 words
            if ($wordCount > 33) {
                $fail("The {$attribute} must not exceed 33 words. (Currently: {$wordCount})");
            }
        };
    })
    ->columnSpanFull(),

                        Forms\Components\Grid::make([
                            'default' => 1,
                            'sm' => 2,
                        ])
                            ->schema([
                                Forms\Components\TextInput::make('profile_gpa_badge')
                                    ->label('GPA Badge')
                                    ->default('GPA 3.8')
                                    ->placeholder('GPA 3.79'),

                                Forms\Components\TextInput::make('profile_degree_badge')
                                    ->label('Degree Badge')
                                    ->default('BSc (Hons) in Software Engineering')
                                    ->placeholder('BSc(Hons)SE'),
                            ]),

                        Forms\Components\TextInput::make('cta_button_text')
                            ->label('CTA Button Text')
                            ->default('Let\'s Work Together')
                            ->placeholder('Let\'s Work Together')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Statistics')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make([
                            'default' => 1,
                            'sm' => 2,
                        ])
                            ->schema([
                                Forms\Components\TextInput::make('stat_projects_count')
                                    ->label('Projects Count')
                                    ->default('5+')
                                    ->placeholder('5+'),

                                Forms\Components\TextInput::make('stat_projects_label')
                                    ->label('Projects Label')
                                    ->default('Projects Completed')
                                    ->placeholder('Projects Completed'),

                                Forms\Components\TextInput::make('stat_technologies_count')
                                    ->label('Technologies Count')
                                    ->default('10+')
                                    ->placeholder('10+'),

                                Forms\Components\TextInput::make('stat_technologies_label')
                                    ->label('Technologies Label')
                                    ->default('Technologies')
                                    ->placeholder('Technologies'),

                                Forms\Components\TextInput::make('stat_team_count')
                                    ->label('Team Count')
                                    ->default('3+')
                                    ->placeholder('Team'),

                                Forms\Components\TextInput::make('stat_team_label')
                                    ->label('Team Label')
                                    ->default('Leadership Skills')
                                    ->placeholder('Leadership Skills'),

                                Forms\Components\TextInput::make('stat_problem_count')
                                    ->label('Problem Count')
                                    ->default('15+')
                                    ->placeholder('Problem'),

                                Forms\Components\TextInput::make('stat_problem_label')
                                    ->label('Problem Label')
                                    ->default('Solving Expert')
                                    ->placeholder('Solving Expert'),
                            ]),

                        Forms\Components\KeyValue::make('stats_icon_urls')
                            ->label('Stats Icon URLs')
                            ->keyLabel('Stat')
                            ->valueLabel('Icon URL')
                            ->helperText('Enter the stat name and its icon URL (e.g., Projects → https://example.com/icon.png)')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Soft Skills')
                    ->collapsible()
                    ->schema([
                        Forms\Components\KeyValue::make('soft_skills')
                            ->label('Soft Skills')
                            ->keyLabel('Skill')
                            ->valueLabel('Icon URL')
                            ->addable(true)
                            ->deletable(true)
                            ->reorderable(true)
                            ->helperText('Add soft skills and their icon URLs (e.g., Communication → https://example.com/icon.png)'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->toggleable()
                    ->visibleFrom('md'),
                Tables\Columns\TextColumn::make('about_greeting')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('profile_name')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('profile_gpa_badge')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visibleFrom('lg'),
                Tables\Columns\TextColumn::make('profile_degree_badge')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visibleFrom('lg'),
                Tables\Columns\TextColumn::make('cta_button_text')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visibleFrom('lg'),
                Tables\Columns\TextColumn::make('stat_projects_count')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visibleFrom('lg'),
                Tables\Columns\TextColumn::make('stat_technologies_count')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visibleFrom('lg'),
                Tables\Columns\TextColumn::make('stat_team_count')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visibleFrom('lg'),
                Tables\Columns\TextColumn::make('stat_problem_count')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visibleFrom('lg'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }

    /** ✅ Show only the current user’s About record */
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
}
