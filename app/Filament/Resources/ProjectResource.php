<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Traits\BelongsToUser;
use App\Models\Project;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class ProjectResource extends Resource
{
    use BelongsToUser;

    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Portfolio';
    public static function canViewAny(): bool
    {
        return !auth()->user()?->hasRole('super_admin');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Project Details')
                ->description('Showcase your work')
                ->icon('heroicon-o-briefcase')
                ->collapsible()
                ->schema([
                    Forms\Components\Hidden::make('user_id')
                        ->default(fn () => auth()->id()),

                    Forms\Components\Grid::make([
                        'default' => 1,
                        'sm' => 2,
                    ])
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->label('Project Title')
                                ->placeholder('e.g. E-commerce Platform'),
                            
                            Forms\Components\FileUpload::make('image')
                                ->image()
                                ->label('Project Thumbnail')
                                ->directory('projects')
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('16:9')
                                ->imageResizeTargetWidth('1920')
                                ->imageResizeTargetHeight('1080'),
                        ]),
                    
                    Forms\Components\Textarea::make('description')
                        ->rows(4)
                        ->label('Project Description')
                        ->columnSpanFull()
                        ->placeholder('Describe the project, technologies used, and your role...'),

                    Forms\Components\Grid::make([
                        'default' => 1,
                        'sm' => 2,
                    ])
                        ->schema([
                            Forms\Components\TextInput::make('link')
                                ->label('Source Code (GitHub)')
                                ->url()
                                ->prefixIcon('heroicon-o-code-bracket')
                                ->placeholder('https://github.com/username/project'),
                            
                            Forms\Components\TextInput::make('depurl')
                                ->label('Live Demo URL')
                                ->url()
                                ->prefixIcon('heroicon-o-globe-alt')
                                ->placeholder('https://myproject.vercel.app')
                                ->helperText('Enter the live deployment URL if available'),
                        ]),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')
                ->label('Thumbnail')
                ->square()
                ->size(50)
                ->toggleable()
                ->visibleFrom('md'),  // Hide on mobile
            
            Tables\Columns\TextColumn::make('title')
                ->sortable()
                ->searchable()
                ->weight('bold')
                ->description(fn (Project $record): string => \Illuminate\Support\Str::limit($record->description, 50))
                ->toggleable(),

            Tables\Columns\TextColumn::make('link')
                ->label('Source')
                ->icon('heroicon-o-code-bracket')
                ->color('gray')
                ->limit(20)
                ->url(fn ($record) => $record->link)
                ->openUrlInNewTab()
                ->toggleable(isToggledHiddenByDefault: true)
                ->visibleFrom('lg'),  // Hide on mobile and tablet

            Tables\Columns\TextColumn::make('depurl')
                ->label('Demo')
                ->icon('heroicon-o-globe-alt')
                ->color('success')
                ->limit(20)
                ->url(fn ($record) => $record->depurl)
                ->openUrlInNewTab()
                ->toggleable(isToggledHiddenByDefault: true)
                ->visibleFrom('lg'),  // Hide on mobile and tablet
        ])->actions([
            Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}