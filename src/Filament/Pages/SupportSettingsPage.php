<?php

namespace LearnKit\Support\Filament\Pages;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use LearnKit\Support\Settings\SupportSettings;

class SupportSettingsPage extends SettingsPage
{
    protected static string $settings = SupportSettings::class;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Support';

    protected static ?string $navigationIcon = 'heroicon-o-support';

    protected function getFormSchema(): array
    {
        return [
            Card::make([
                Toggle::make('bubble_active')
                    ->label('Toon bubbel'),
            ]),
        ];
    }

    /*public static function registerNavigationItems(): void
    {
        ray('Test');
    }*/
}
