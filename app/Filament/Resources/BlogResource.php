<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Traits\BelongsToUser;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    use BelongsToUser;

    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?string $navigationLabel = 'Blog Posts';

    public static function canViewAny(): bool
    {
        // Only premium users can manage blog posts (not super admin, not free users)
        $user = auth()->user();

        // Return false if no user
        if (!$user) {
            return false;
        }

        // Exclude super admin
        if ($user->hasRole('super_admin')) {
            return false;
        }

        // Only allow premium users
        return $user->isPremium();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('user_id')
                ->default(fn() => auth()->id()),

            Forms\Components\Section::make('Post Details')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('slug')
                        ->disabled()
                        ->dehydrated(false)
                        ->helperText('Slug is generated automatically from the title'),

                    Forms\Components\Textarea::make('excerpt')
                        ->rows(3)
                        ->maxLength(500)
                        ->helperText('Short summary shown in blog lists.'),

                    Forms\Components\RichEditor::make('content')
                        ->required()
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'bulletList',
                            'orderedList',
                            'link',
                            'h2',
                            'h3',
                            'blockquote',
                        ])
                        ->columnSpanFull(),
                ])->columns(2),

            Forms\Components\Section::make('Publish Settings')
                ->schema([
                    Forms\Components\Toggle::make('is_published')
                        ->label('Published')
                        ->default(false)
                        ->live()
                        ->afterStateUpdated(function ($state, callable $set, $get) {
                            // Auto-set published_at to now when toggled to published (if empty)
                            if ($state && !$get('published_at')) {
                                $set('published_at', now());
                            }
                        }),

                    Forms\Components\DateTimePicker::make('published_at')
                        ->label('Published At')
                        ->helperText('Leave empty to publish immediately. Timezone: ' . config('app.timezone'))
                        ->seconds(false)
                        ->default(now())
                        ->native(false)
                        ->displayFormat('M d, Y H:i')
                        ->maxDate(now()->addYears(1))
                        ->minDate(now()->subYears(1)),

                    Forms\Components\FileUpload::make('hero_image_path')
                        ->label('Hero Image')
                        ->image()
                        ->directory('blog-hero-images')
                        ->imagePreviewHeight('150')
                        ->maxSize(2048),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->wrap()
                    ->limit(60),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray'),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published At')
                    ->dateTime('M j, Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->since()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}


