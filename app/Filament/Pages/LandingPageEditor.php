<?php

namespace App\Filament\Pages;

use App\Models\LandingPageContent;
use Filament\Notifications\Notification;
use Filament\Forms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class LandingPageEditor extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationGroup = 'Super Admin';
    protected static ?string $navigationLabel = 'Landing Page Editor';
    protected static string $view = 'filament.pages.landing-page-editor';
    protected static ?int $navigationSort = 2;

    public array $data = [];

    public function mount()
    {
        if (!Auth::user()?->hasRole('super_admin')) {
            abort(403);
        }

        $contents = LandingPageContent::all();

        foreach ($contents as $item) {
            $this->data[$item->key] = $item->value;
        }
    }

    public function save()
    {
        foreach ($this->data as $key => $value) {
            LandingPageContent::where('key', $key)->update(['value' => $value]);
        }

        Notification::make()
            ->title('Landing Page Updated Successfully 🎉')
            ->success()
            ->send();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('🎯 Hero Section')
                ->description('Edit the main hero content displayed at the top of your website.')
                ->schema([
                    Forms\Components\TextInput::make('hero_title')->label('Hero Title'),
                    Forms\Components\Textarea::make('hero_subtitle')->label('Hero Subtitle'),
                    Forms\Components\TextInput::make('hero_cta_primary')->label('Primary CTA Text'),
                    Forms\Components\TextInput::make('hero_cta_secondary')->label('Secondary CTA Text'),
                ])
                ->columns(2),

            Forms\Components\Section::make('⚡ Features Section')
                ->description('Manage the feature blocks that highlight what your platform offers.')
                ->schema([
                    Forms\Components\TextInput::make('features_title')->label('Features Main Title'),
                    Forms\Components\Textarea::make('features_subtitle')->label('Features Subtitle'),

                    Forms\Components\Section::make('Feature 1')
                        ->schema([
                            Forms\Components\TextInput::make('feature_1_title')->label('Feature 1 Title'),
                            Forms\Components\Textarea::make('feature_1_description')->label('Feature 1 Description'),
                        ]),

                    Forms\Components\Section::make('Feature 2')
                        ->schema([
                            Forms\Components\TextInput::make('feature_2_title')->label('Feature 2 Title'),
                            Forms\Components\Textarea::make('feature_2_description')->label('Feature 2 Description'),
                        ]),

                    Forms\Components\Section::make('Feature 3')
                        ->schema([
                            Forms\Components\TextInput::make('feature_3_title')->label('Feature 3 Title'),
                            Forms\Components\Textarea::make('feature_3_description')->label('Feature 3 Description'),
                        ]),
                ])
                ->columns(2)
                ->collapsible(),

            Forms\Components\Section::make('🎨 Themes Showcase')
                ->description('Customize the theme selection section of your landing page.')
                ->schema([
                    Forms\Components\TextInput::make('themes_title')->label('Themes Title'),
                    Forms\Components\Textarea::make('themes_subtitle')->label('Themes Subtitle'),
                ])
                ->columns(2),

            Forms\Components\Section::make('📧 Contact Section')
                ->description('Update your contact details displayed on the landing page.')
                ->schema([
                    Forms\Components\TextInput::make('contact_title')->label('Contact Title'),
                    Forms\Components\Textarea::make('contact_subtitle')->label('Contact Subtitle'),
                    Forms\Components\TextInput::make('contact_email')->label('Email Address'),
                    Forms\Components\TextInput::make('contact_phone')->label('Phone Number'),
                    Forms\Components\TextInput::make('contact_address')->label('Address'),
                ])
                ->columns(2),

            Forms\Components\Section::make('🔗 Footer Section')
                ->description('Edit the footer details that appear at the bottom of the website.')
                ->schema([
                    Forms\Components\TextInput::make('footer_company_name')->label('Company Name'),
                    Forms\Components\TextInput::make('footer_tagline')->label('Tagline'),
                    Forms\Components\TextInput::make('footer_copyright')->label('Copyright Text'),
                ])
                ->columns(2),
        ];
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Save Changes')
                ->color('primary')
                ->icon('heroicon-o-check-circle')
                ->submit('save'),
        ];
    }
}
