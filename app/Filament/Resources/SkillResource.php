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

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('user_id')
                ->default(fn () => auth()->id()),

            Forms\Components\TextInput::make('name')
                ->required()
                ->label('Skill Name')
                ->placeholder('e.g., React, Node.js, MongoDB'),

            Forms\Components\TextInput::make('url')
                ->label('Icon URL')
                ->placeholder('e.g., https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg')
                ->helperText('Enter the full URL to the skill icon image')
                ->url(),

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
                ->helperText('Select the category this skill belongs to'),

            Forms\Components\TextInput::make('level')
                ->label('Proficiency (e.g. 80%)')
                ->placeholder('Optional: e.g., Expert, 90%, Advanced'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\BadgeColumn::make('category')
                    ->colors([
                        'primary' => 'frontend',
                        'success' => 'backend',
                        'warning' => 'database',
                        'danger' => 'tools',
                    ])
                    ->formatStateUsing(fn(string $state): string => ucfirst($state))
                    ->sortable(),

                Tables\Columns\TextColumn::make('level')
                    ->sortable(),
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}