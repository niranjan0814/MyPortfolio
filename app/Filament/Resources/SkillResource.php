<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Filament\Traits\BelongsToUser;
use App\Models\Skill;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class SkillResource extends Resource
{
    use BelongsToUser;

    protected static ?string $model = Skill::class;
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationGroup = 'Portfolio';
    public static function canViewAny(): bool
    {
        return !auth()->user()?->hasRole('super_admin');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Skill Details')
                ->description('Add your technical skills')
                ->icon('heroicon-o-light-bulb')
                ->collapsible()
                ->schema([
                    Forms\Components\Hidden::make('user_id')
                        ->default(fn () => auth()->id()),

                    Forms\Components\Grid::make([
                        'default' => 1,
                        'sm' => 2,
                    ])
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->label('Skill Name')
                                ->placeholder('e.g., React')
                                ->prefixIcon('heroicon-o-code-bracket'),

                            Forms\Components\Select::make('category')
                                ->required()
                                ->options([
                                    'frontend' => 'Frontend',
                                    'backend' => 'Backend',
                                    'database' => 'Database',
                                    'tools' => 'Tools',
                                ])
                                ->default('frontend')
                                ->label('Category')
                                ->prefixIcon('heroicon-o-tag'),
                        ]),

                    Forms\Components\TextInput::make('url')
                        ->label('Icon URL')
                        ->placeholder('https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg')
                        ->helperText('Enter the full URL to the skill icon image (SVG/PNG)')
                        ->url()
                        ->prefixIcon('heroicon-o-link')
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('level')
                        ->label('Proficiency')
                        ->placeholder('e.g., Expert, 90%, Advanced')
                        ->prefixIcon('heroicon-o-chart-bar')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('url')
                    ->label('Icon')
                    ->square()
                    ->size(40)
                    ->defaultImageUrl('https://placehold.co/40x40?text=?')
                    ->toggleable()
                    ->visibleFrom('md'),  // Hide on mobile

                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->weight('bold')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'frontend' => 'info',
                        'backend' => 'success',
                        'database' => 'warning',
                        'tools' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => ucfirst($state))
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('level')
                    ->label('Level')
                    ->sortable()
                    ->badge()
                    ->color('gray')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visibleFrom('lg'),  // Hide on mobile and tablet
            ])
            ->defaultSort('category', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'frontend' => 'Frontend',
                        'backend' => 'Backend',
                        'database' => 'Database',
                        'tools' => 'Tools',
                    ])
                    ->label('Filter by Category'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}