<?php

namespace App\Filament\Pages;

use App\Models\LandingPageContent;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Filament\Actions;


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
            // Determine the section based on the key prefix
            $section = $this->determineSectionFromKey($key);
            
            LandingPageContent::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'section' => $section,  // ✅ FIX: Add section field
                    'updated_at' => now()
                ]
            );
        }

        // ✅ CRITICAL: Clear ALL cache after saving
        Cache::flush();

        // Also clear specific landing page cache keys
        Cache::forget('landing_section_hero');
        Cache::forget('landing_section_features');
        Cache::forget('landing_section_themes');
        Cache::forget('landing_section_contact');
        Cache::forget('landing_section_footer');

        Notification::make()
            ->title('Landing Page Updated Successfully 🎉')
            ->success()
            ->send();

        // Refresh the form with updated data
        $this->mount();
    }

    /**
     * Determine the section name based on the field key
     */
    private function determineSectionFromKey(string $key): string
    {
        if (str_starts_with($key, 'hero_') || str_starts_with($key, 'stat_')) {
            return 'hero';
        } elseif (str_starts_with($key, 'preview_') || str_starts_with($key, 'visual_')) {
            return 'hero';
        } elseif (str_starts_with($key, 'feature')) {
            return 'features';
        } elseif (str_starts_with($key, 'themes_')) {
            return 'themes';
        } elseif (str_starts_with($key, 'contact_')) {
            return 'contact';
        } elseif (str_starts_with($key, 'footer_')) {
            return 'footer';
        }
        
        return 'general';
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
                ->description('Configure the portfolio preview card. You can link to a real user OR manually edit all fields.')
                ->schema([
                    Forms\Components\Select::make('visual_type')
                        ->label('Visual Type')
                        ->options([
                            'portfolio_preview' => 'Portfolio Preview Card',
                            'metrics_dashboard' => 'Metrics Dashboard (Coming Soon)',
                            'testimonials' => 'Testimonials Carousel (Coming Soon)',
                        ])
                        ->default('portfolio_preview')
                        ->required()
                        ->reactive()
                        ->helperText('Select which preview to show in the hero section'),

                    // ✅ User Selection Dropdown (OPTIONAL)
                    Forms\Components\Select::make('preview_user_id')
                        ->label('🔗 Link to Real User (Optional)')
                        ->options(function () {
                            return User::whereHas('roles', function ($query) {
                                $query->whereIn('name', ['free_user', 'premium_user']);
                            })
                                ->whereDoesntHave('roles', function ($query) {
                                    $query->where('name', 'super_admin');
                                })
                                ->orderBy('full_name')
                                ->get()
                                ->mapWithKeys(function ($user) {
                                    return [$user->id => ($user->full_name ?: $user->name) . ' (' . $user->email . ')'];
                                })
                                ->toArray();
                        })
                        ->searchable()
                        ->nullable()  // ✅ Made optional
                        ->reactive()
                        ->afterStateUpdated(function ($state, $set) {
                            if ($state) {
                                $user = User::with(['projects', 'about'])->find($state);
                                if ($user) {
                                    // Auto-fill fields when user is selected
                                    $set('preview_name', $user->full_name ?? $user->name);

                                    $description = $user->description ?? 'Professional Developer';
                                    $cleanDescription = strip_tags($description);
                                    $cleanDescription = preg_replace('/\s+/', ' ', trim($cleanDescription));
                                    if (strlen($cleanDescription) > 100) {
                                        $cleanDescription = substr($cleanDescription, 0, 97) . '...';
                                    }
                                    $set('preview_title', $cleanDescription);

                                    $about = $user->about;
                                    $bio = $about ? $about->about_description : 'Creating amazing digital experiences';
                                    $cleanBio = strip_tags($bio);
                                    $cleanBio = preg_replace('/\s+/', ' ', trim($cleanBio));
                                    $cleanBio = preg_replace('/&nbsp;/', ' ', $cleanBio);
                                    if (strlen($cleanBio) > 200) {
                                        $cleanBio = substr($cleanBio, 0, 197) . '...';
                                    }
                                    $set('preview_bio', $cleanBio);

                                    $set('preview_projects_count', $user->projects()->count());

                                    // Set portfolio URL
                                    $set('preview_portfolio_url', route('portfolio.show', $user->slug));
                                }
                            }
                        })
                        ->helperText('💡 Select a user to auto-fill fields, or leave empty to use custom values below')
                        ->visible(fn($get) => $get('visual_type') === 'portfolio_preview'),

                    // ✅ INFO BOX
                    Forms\Components\Placeholder::make('preview_modes')
                        ->label('How Preview Data Works')
                        ->content(new \Illuminate\Support\HtmlString('
                            <div class="text-sm space-y-2">
                                <p class="font-semibold">Two Ways to Configure Preview:</p>
                                <ul class="list-disc list-inside space-y-1 ml-2">
                                    <li><strong>Live User Mode:</strong> Select a user above → fields auto-fill → landing page shows their REAL data</li>
                                    <li><strong>Manual Mode:</strong> Leave user empty → edit fields below → landing page shows your custom data</li>
                                </ul>
                                <p class="text-blue-600 mt-2">💡 Tip: You can select a user to auto-fill, then manually edit the fields to override specific values!</p>
                            </div>
                        '))
                        ->visible(fn($get) => $get('visual_type') === 'portfolio_preview'),

                    // ✅ FULLY EDITABLE Fields (No longer disabled!)
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('preview_name')
                                ->label('👤 Preview: Name')
                                ->default('John Doe')
                                ->required()
                                ->maxLength(100)
                                ->helperText('Display name on preview card'),
                            
                            Forms\Components\TextArea::make('preview_title')
                                ->label('💼 Preview: Job Title')
                                ->default('Senior Product Designer')
                                ->required()
                                ->maxLength(150)
                                ->helperText('Professional title or role'),
                        ])
                        ->visible(fn($get) => $get('visual_type') === 'portfolio_preview'),

                    Forms\Components\Textarea::make('preview_bio')
                        ->label('📝 Preview: Short Bio')
                        ->default('Crafting beautiful digital experiences for over 5 years')
                        ->required()
                        ->rows(2)
                        ->maxLength(250)
                        ->helperText('Brief description (max 250 chars)')
                        ->columnSpanFull()
                        ->visible(fn($get) => $get('visual_type') === 'portfolio_preview'),

                    // ✅ Statistics Fields
                    Forms\Components\Fieldset::make('📊 Preview Statistics')
                        ->schema([
                            Forms\Components\TextInput::make('preview_projects_count')
                                ->label('Projects')
                                ->default('24')
                                ->required()
                                ->helperText('e.g., "24" or "20+"'),
                            
                            Forms\Components\TextInput::make('preview_clients_count')
                                ->label('Clients')
                                ->default('50+')
                                ->required()
                                ->helperText('e.g., "50+" or "100"'),
                            
                            Forms\Components\TextInput::make('preview_awards_count')
                                ->label('Awards')
                                ->default('12')
                                ->required()
                                ->helperText('e.g., "12" or "5+"'),
                        ])
                        ->columns(3)
                        ->visible(fn($get) => $get('visual_type') === 'portfolio_preview'),

                    Forms\Components\TextInput::make('preview_portfolio_url')
                        ->label('🔗 Preview: Portfolio Link (Optional)')
                        ->url()
                        ->placeholder('https://example.com/portfolio')
                        ->helperText('Link to full portfolio or leave empty')
                        ->columnSpanFull()
                        ->visible(fn($get) => $get('visual_type') === 'portfolio_preview'),
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

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('preview')
                ->label('Preview Landing Page')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->modalHeading('Landing Page Preview')
                ->modalWidth('7xl')
                ->modalContent(
                    view('filament.modals.landing-preview', [
                        'data' => $this->form->getState(),
                    ])
                )
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close'),
        ];
    }
}