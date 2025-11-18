<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectOverviewResource\Pages;
use App\Filament\Traits\BelongsToUser;
use App\Models\ProjectOverview;
use App\Models\Project;
use App\Models\Skill;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class ProjectOverviewResource extends Resource
{
    use BelongsToUser;

    protected static ?string $model = ProjectOverview::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Portfolio';
    protected static ?string $navigationLabel = 'Project Overviews';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('user_id')
                ->default(fn () => auth()->id()),

            Forms\Components\Section::make('Project Selection')
                ->schema([
                    Forms\Components\Select::make('project_id')
                        ->label('Select Project')
                        ->options(fn() => Project::where('user_id', auth()->id())->pluck('title', 'id'))
                        ->required()
                        ->searchable()
                        ->helperText('Choose the project this overview belongs to'),
                ]),

            Forms\Components\Section::make('Overview Description')
                ->schema([
                    Forms\Components\RichEditor::make('overview_description')
                        ->label('Project Overview')
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'link',
                            'bulletList',
                            'orderedList',
                            'h2',
                            'h3',
                        ])
                        ->placeholder('Write a detailed overview of the project...')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Key Features')
                ->schema([
                    Forms\Components\KeyValue::make('key_features')
                        ->label('Key Features')
                        ->keyLabel('Feature Name')
                        ->valueLabel('Feature Description')
                        ->helperText('Add key features with descriptions')
                        ->addActionLabel('Add Feature')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Project Gallery')
                ->schema([
                    Forms\Components\Textarea::make('gallery_images')
                        ->label('Gallery Image URLs')
                        ->helperText('Enter image URLs, one per line.')
                        ->rows(5)
                        ->placeholder("https://example.com/image1.jpg\nhttps://example.com/image2.jpg")
                        ->dehydrateStateUsing(fn ($state) => array_filter(array_map('trim', explode("\n", $state))))
                        ->formatStateUsing(fn ($state) => is_array($state) ? implode("\n", $state) : $state)
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Technology Stack')
                ->schema([
                    Forms\Components\Select::make('tech_stack')
                        ->label('Tech Stack')
                        ->multiple()
                        ->options(fn() => Skill::where('user_id', auth()->id())->orderBy('name')->pluck('name', 'id'))
                        ->searchable()
                        ->helperText('Select the technologies used in this project')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.title')
                    ->label('Project')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('key_features')
                    ->label('Features')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) . ' features' : '0 features')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('gallery_images')
                    ->label('Gallery')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) . ' images' : '0 images')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('tech_stack')
                    ->label('Tech Stack')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) . ' technologies' : '0 technologies')
                    ->badge()
                    ->color('warning'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('project_id')
                    ->label('Filter by Project')
                    ->options(fn() => Project::where('user_id', auth()->id())->pluck('title', 'id')),
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
            'index' => Pages\ListProjectOverviews::route('/'),
            'create' => Pages\CreateProjectOverview::route('/create'),
            'edit' => Pages\EditProjectOverview::route('/{record}/edit'),
        ];
    }
}