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
    public static function canViewAny(): bool
    {
        return !auth()->user()?->hasRole('super_admin');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Experience Details')
                ->collapsible()
                ->schema([
                    Forms\Components\Hidden::make('user_id')
                        ->default(fn () => auth()->id()),

                    Forms\Components\Grid::make([
                        'default' => 1,
                        'sm' => 2,
                    ])
                        ->schema([
                            Forms\Components\TextInput::make('role')
                                ->required()
                                ->maxLength(52)
                                ->rules([
                                    fn (\Filament\Forms\Get $get, $record): \Closure => function (string $attribute, $value, \Closure $fail) use ($get, $record) {
                                        $exists = \App\Models\Experience::where('user_id', auth()->id())
                                            ->where('role', $value)
                                            ->where('company', $get('company'))
                                            ->where('duration', $get('duration'))
                                            ->when($record, fn ($q) => $q->where('id', '!=', $record->id))
                                            ->exists();

                                        if ($exists) {
                                            $fail('You already have an identical experience (same role, company, and duration).');
                                        }
                                    },
                                ]),

                            Forms\Components\TextInput::make('company')
                                ->required()
                                ->maxLength(52),
                            Forms\Components\TextInput::make('duration')->label('Period'),
                        ]),

                    Forms\Components\Textarea::make('details')
                        ->rows(3)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('role')->sortable()->searchable()->toggleable(),
            Tables\Columns\TextColumn::make('company')->toggleable(),
            Tables\Columns\TextColumn::make('duration')->toggleable()->visibleFrom('md'),
        ])->actions([
            Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]),
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