<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Portfolio';

    public static function form(Forms\Form $form): Forms\Form
{
    return $form->schema([
        Forms\Components\TextInput::make('title')
            ->required()
            ->label('Project Title'),
        
        Forms\Components\Textarea::make('description')
            ->rows(3)
            ->label('Project Description'),
        
        Forms\Components\TextInput::make('link')
            ->label('GitHub/Source URL')
            ->url()
            ->placeholder('https://github.com/username/project'),
        
        Forms\Components\TextInput::make('depurl')
            ->label('Deployment URL (Live Demo)')
            ->url()
            ->placeholder('https://myproject.vercel.app')
            ->helperText('Enter the live deployment URL if the project is deployed'),
        
        Forms\Components\FileUpload::make('image')
            ->image()
            ->label('Project Image'),
    ]);
}

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('link'),
        ])->actions([Tables\Actions\EditAction::make()]);
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
