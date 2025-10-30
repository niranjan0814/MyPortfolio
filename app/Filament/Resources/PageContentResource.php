<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageContentResource\Pages;
use App\Models\PageContent;
use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationLabel = 'Page Content';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Content Information')
                ->schema([
                    // User Selection (for admin) - Hidden for regular users
                    Forms\Components\Select::make('user_id')
                        ->label('User')
                        ->options(User::pluck('name', 'id'))
                        ->default(Auth::id())
                        ->required()
                        ->searchable()
                        ->visible(fn() => Auth::user()?->email === 'admin@example.com') // Only show for admin
                        ->columnSpanFull(),
                    
                    Forms\Components\TextInput::make('key')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->label('Key')
                        ->helperText('Unique identifier for this content (e.g., hero_name)')
                        ->placeholder('hero_name')
                        ->columnSpanFull(),
                    
                    Forms\Components\Select::make('section')
                        ->required()
                        ->options([
                            'hero' => 'Hero Section',
                            'about' => 'About Section',
                            'contact' => 'Contact Section',
                            'footer' => 'Footer Section',
                            'general' => 'General',
                        ])
                        ->default('general')
                        ->label('Section')
                        ->helperText('Which section does this content belong to?'),
                    
                    Forms\Components\Select::make('type')
                        ->required()
                        ->options([
                            'text' => 'Text (Short)',
                            'textarea' => 'Text Area (Long)',
                            'html' => 'HTML Content',
                            'image' => 'Image URL',
                            'number' => 'Number',
                        ])
                        ->default('text')
                        ->reactive()
                        ->label('Content Type'),
                ])->columns(2),
            
            Forms\Components\Section::make('Content Value')
                ->schema([
                    Forms\Components\TextInput::make('value')
                        ->label('Value')
                        ->required()
                        ->maxLength(255)
                        ->visible(fn (callable $get) => in_array($get('type'), ['text', 'image', 'number']))
                        ->columnSpanFull(),
                    
                    Forms\Components\Textarea::make('value')
                        ->label('Value')
                        ->required()
                        ->rows(5)
                        ->visible(fn (callable $get) => $get('type') === 'textarea')
                        ->columnSpanFull(),
                    
                    Forms\Components\RichEditor::make('value')
                        ->label('Value')
                        ->required()
                        ->visible(fn (callable $get) => $get('type') === 'html')
                        ->columnSpanFull(),
                    
                    Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->helperText('Optional: Describe what this content is used for')
                        ->rows(2)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->visible(fn() => Auth::user()?->email === 'admin@example.com'), // Only show for admin
                
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->copyable(),
                
                Tables\Columns\BadgeColumn::make('section')
                    ->colors([
                        'success' => 'hero',
                        'primary' => 'about',
                        'warning' => 'contact',
                        'danger' => 'footer',
                        'secondary' => 'general',
                    ])
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M j, Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('section', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Filter by User')
                    ->options(User::pluck('name', 'id'))
                    ->visible(fn() => Auth::user()?->email === 'admin@example.com'),
                
                Tables\Filters\SelectFilter::make('section')
                    ->options([
                        'hero' => 'Hero Section',
                        'about' => 'About Section',
                        'contact' => 'Contact Section',
                        'footer' => 'Footer Section',
                        'general' => 'General',
                    ])
                    ->label('Filter by Section'),
                
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Text Area',
                        'html' => 'HTML',
                        'image' => 'Image',
                        'number' => 'Number',
                    ])
                    ->label('Filter by Type'),
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

    // Automatically set user_id when creating new content
    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        // If user_id is not set (non-admin users), set it to current user
        if (!isset($data['user_id'])) {
            $data['user_id'] = Auth::id();
        }
        
        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageContents::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit' => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }

    // Only show user's own content (unless admin)
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();
        
        // If not admin, only show current user's content
        if (Auth::user()?->email !== 'admin@example.com') {
            $query->where('user_id', Auth::id());
        }
        
        return $query;
    }
}