<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Support\Facades\Hash;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        // Basic Fields
                        $this->getNameFormComponent()
                            ->label('Username'),

                        TextInput::make('full_name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('John Doe'),

                        $this->getEmailFormComponent(),

                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel()
                            ->placeholder('+1 234 567 8900'),

                        TextInput::make('location')
                            ->label('Location')
                            ->maxLength(255)
                            ->placeholder('New York, USA'),

                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function mutateFormDataBeforeRegister(array $data): array
    {
        $data['password'] = Hash::make($data['password']);

        // ✅ AUTO-APPLY SELECTED THEME FROM LANDING PAGE
        $selectedTheme = session('selected_theme', 'theme1');
        $data['active_theme'] = $selectedTheme;

        if (empty($data['description'])) {
            $data['description'] = 'Full-Stack Developer specializing in modern web technologies.';
        }

        return $data;
    }
}