<?php

namespace App\Filament\Pages;

use App\Models\LandingPageContent;
use Filament\Notifications\Notification;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class LandingPageEditor extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationGroup = 'Super Admin';
    protected static ?string $navigationLabel = 'Landing Page Editor';
    protected static string $view = 'filament.pages.landing-page-editor';
    protected static ?int $navigationSort = 2;

    public ?array $data = [];

    public function mount(): void
    {
        if (!Auth::user()?->hasRole('super_admin')) {
            abort(403);
        }

        $contents = LandingPageContent::all();

        foreach ($contents as $item) {
            $this->data[$item->key] = $item->value;
        }

        $this->form->fill($this->data);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            LandingPageContent::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'updated_at' => now()
                ]
            );
        }

        Notification::make()
            ->title('Landing Page Updated Successfully 🎉')
            ->success()
            ->send();

        // Refresh the form with updated data
        $this->mount();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('🎯 Hero Section')
                ->description('Edit the main hero content displayed at the top of your website.')
                ->schema([
                    Forms\Components\TextInput::make('hero_title')
                        ->label('Hero Title - Line 1')
                        ->required()
                        ->maxLength(255)
                        ->helperText('First line of the hero title (e.g., "Showcase Your Extraordinary")'),
                    
                    Forms\Components\TextInput::make('hero_title_line2')
                        ->label('Hero Title - Line 2')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Second line in orange color (e.g., "Work")'),
                    
                    Forms\Components\Textarea::make('hero_subtitle')
                        ->label('Hero Subtitle')
                        ->required()
                        ->rows(3)
                        ->maxLength(500),
                    
                    Forms\Components\TextInput::make('hero_cta_primary')
                        ->label('Primary CTA Text')
                        ->required()
                        ->maxLength(50),
                    
                    Forms\Components\TextInput::make('hero_cta_secondary')
                        ->label('Secondary CTA Text')
                        ->required()
                        ->maxLength(50),
                ])
                ->columns(2),

            Forms\Components\Section::make('📊 Statistics Section')
                ->description('Edit the statistics displayed in the hero section.')
                ->schema([
                    Forms\Components\Fieldset::make('Statistic 1')
                        ->schema([
                            Forms\Components\TextInput::make('stat_1_value')
                                ->label('Value (e.g., 500+)')
                                ->required()
                                ->maxLength(50),
                            Forms\Components\TextInput::make('stat_1_label')
                                ->label('Label')
                                ->required()
                                ->maxLength(100),
                        ])
                        ->columns(2),

                    Forms\Components\Fieldset::make('Statistic 2')
                        ->schema([
                            Forms\Components\TextInput::make('stat_2_value')
                                ->label('Value (e.g., 50K+)')
                                ->required()
                                ->maxLength(50),
                            Forms\Components\TextInput::make('stat_2_label')
                                ->label('Label')
                                ->required()
                                ->maxLength(100),
                        ])
                        ->columns(2),

                    Forms\Components\Fieldset::make('Statistic 3')
                        ->schema([
                            Forms\Components\TextInput::make('stat_3_value')
                                ->label('Value (e.g., 99.9%)')
                                ->required()
                                ->maxLength(50),
                            Forms\Components\TextInput::make('stat_3_label')
                                ->label('Label')
                                ->required()
                                ->maxLength(100),
                        ])
                        ->columns(2),
                ])
                ->columns(1)
                ->collapsible(),

            Forms\Components\Section::make('🎨 Hero Visual Preview')
                ->description('Customize the portfolio preview card shown in the hero section.')
                ->schema([
                    Forms\Components\Select::make('visual_type')
                        ->label('Visual Type')
                        ->options([
                            'portfolio_preview' => 'Portfolio Preview Card',
                            'metrics_dashboard' => 'Metrics Dashboard (Coming Soon)',
                            'testimonials' => 'Testimonials Carousel (Coming Soon)',
                        ])
                        ->default('portfolio_preview')
                        ->required(),
                    
                    Forms\Components\TextInput::make('preview_name')
                        ->label('Preview User Name')
                        ->maxLength(100)
                        ->helperText('Example user name for the preview card'),
                    
                    Forms\Components\TextInput::make('preview_title')
                        ->label('Preview User Title')
                        ->maxLength(100)
                        ->helperText('Example job title/role'),
                    
                    Forms\Components\Textarea::make('preview_bio')
                        ->label('Preview Bio')
                        ->rows(2)
                        ->maxLength(200),
                    
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('preview_projects_count')
                                ->label('Projects Count')
                                ->maxLength(10),
                            Forms\Components\TextInput::make('preview_clients_count')
                                ->label('Clients Count')
                                ->maxLength(10),
                            Forms\Components\TextInput::make('preview_awards_count')
                                ->label('Awards Count')
                                ->maxLength(10),
                        ]),
                ])
                ->columns(2)
                ->collapsible(),

            Forms\Components\Section::make('⚡ Features Section')
                ->description('Manage the feature blocks that highlight what your platform offers.')
                ->schema([
                    Forms\Components\TextInput::make('features_title')
                        ->label('Features Main Title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('features_subtitle')
                        ->label('Features Subtitle')
                        ->required()
                        ->rows(2)
                        ->maxLength(500),

                    Forms\Components\Fieldset::make('Feature 1')
                        ->schema([
                            Forms\Components\TextInput::make('feature_1_title')
                                ->label('Title')
                                ->required()
                                ->maxLength(100),
                            Forms\Components\Textarea::make('feature_1_description')
                                ->label('Description')
                                ->required()
                                ->rows(2)
                                ->maxLength(255),
                        ])
                        ->columns(2),

                    Forms\Components\Fieldset::make('Feature 2')
                        ->schema([
                            Forms\Components\TextInput::make('feature_2_title')
                                ->label('Title')
                                ->required()
                                ->maxLength(100),
                            Forms\Components\Textarea::make('feature_2_description')
                                ->label('Description')
                                ->required()
                                ->rows(2)
                                ->maxLength(255),
                        ])
                        ->columns(2),

                    Forms\Components\Fieldset::make('Feature 3')
                        ->schema([
                            Forms\Components\TextInput::make('feature_3_title')
                                ->label('Title')
                                ->required()
                                ->maxLength(100),
                            Forms\Components\Textarea::make('feature_3_description')
                                ->label('Description')
                                ->required()
                                ->rows(2)
                                ->maxLength(255),
                        ])
                        ->columns(2),
                ])
                ->columns(1)
                ->collapsible(),

            Forms\Components\Section::make('🎨 Themes Showcase')
                ->description('Customize the theme selection section of your landing page.')
                ->schema([
                    Forms\Components\TextInput::make('themes_title')
                        ->label('Themes Title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('themes_subtitle')
                        ->label('Themes Subtitle')
                        ->required()
                        ->rows(2)
                        ->maxLength(500),
                ])
                ->columns(2),

            Forms\Components\Section::make('📧 Contact Section')
                ->description('Update your contact details displayed on the landing page.')
                ->schema([
                    Forms\Components\TextInput::make('contact_title')
                        ->label('Contact Title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('contact_subtitle')
                        ->label('Contact Subtitle')
                        ->required()
                        ->rows(3)
                        ->maxLength(500),
                    Forms\Components\TextInput::make('contact_email')
                        ->label('Email Address')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('contact_phone')
                        ->label('Phone Number')
                        ->tel()
                        ->required()
                        ->maxLength(50),
                    Forms\Components\TextInput::make('contact_address')
                        ->label('Address')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('🔗 Footer Section')
                ->description('Edit the footer details that appear at the bottom of the website.')
                ->schema([
                    Forms\Components\TextInput::make('footer_company_name')
                        ->label('Company Name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('footer_tagline')
                        ->label('Tagline')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('footer_copyright')
                        ->label('Copyright Text')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ];
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }
}