<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Filament\Traits\BelongsToUser;
use App\Models\Education;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Closure as BaseClosure;

class EducationResource extends Resource
{
    use BelongsToUser;

    protected static ?string $model = Education::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Portfolio';
    public static function canViewAny(): bool
    {
        return !auth()->user()?->hasRole('super_admin');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('user_id')
                ->default(fn () => auth()->id()),

            Forms\Components\TextInput::make('institution')->required(),
            Forms\Components\TextInput::make('degree')->required(),
            Forms\Components\TextInput::make('year'),
            Forms\Components\Textarea::make('details')
                ->rows(2)
                ->helperText('Maximum 12 words allowed.')
                ->rule(function () {
                    return function (string $attribute, $value, \Closure $fail) {
                        if ($value) {
                            $wordCount = str_word_count($value);
                            if ($wordCount > 11) {
                                $fail("The {$attribute} must not exceed 12 words. (Currently: {$wordCount})");
                            }
                        }
                    };
                }),
            Forms\Components\TextInput::make('icon_url')
                ->label('Icon URL')
                ->url()
                ->placeholder('https://example.com/icon.png')
                ->helperText('Enter a URL for the education icon (e.g., from Icons8)'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('institution'),
            Tables\Columns\TextColumn::make('degree'),
            Tables\Columns\TextColumn::make('year'),
            Tables\Columns\TextColumn::make('icon_url')->label('Icon URL'),
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
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
