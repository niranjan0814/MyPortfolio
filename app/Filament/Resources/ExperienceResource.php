<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Filament\Traits\BelongsToUser;
use App\Models\Experience;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class ExperienceResource extends Resource
{
    use BelongsToUser;

    protected static ?string $model = Experience::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Portfolio';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('user_id')
                ->default(fn () => auth()->id()),

            Forms\Components\TextInput::make('role')->required(),
            Forms\Components\TextInput::make('company')->required(),
            Forms\Components\TextInput::make('duration')->label('Period'),
            Forms\Components\Textarea::make('details')->rows(3),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('role')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('company'),
            Tables\Columns\TextColumn::make('duration'),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}