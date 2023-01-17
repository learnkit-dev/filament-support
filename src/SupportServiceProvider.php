<?php

namespace LearnKit\Support;

use Filament\Facades\Filament;
use LearnKit\Support\Filament\Pages\SupportSettingsPage;
use LearnKit\Support\Models\Concerns\HasSupportAccess;
use LearnKit\Support\Settings\SupportSettings;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use LearnKit\Support\Commands\SupportCommand;

class SupportServiceProvider extends PackageServiceProvider
{
    protected array $pages = [
        SupportSettingsPage::class,
    ];

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('support')
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        $this->app->resolving('filament', function () {
            Filament::registerPages($this->pages);
        });
    }

    public function bootingPackage()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/settings');

        /*config()->set('settings.settings', [
            ...config('settings.settings') ?? [],
            //SupportSettings::class,
        ]);*/
    }

    public function packageBooted()
    {
        foreach ($this->pages as $page) {
            ray($page::getName());

            \Livewire::component($page::getName(), $page);
        }

        Filament::serving(function () {
            Filament::registerRenderHook('head.end', function () {
                // Check if the user has access to the support bubble
                $userClass = get_class(auth()->user());

                if (! in_array(HasSupportAccess::class, class_uses_recursive($userClass))) {
                    return;
                }

                if (! auth()->user()->canUseSupportBubble()) {
                    return;
                }

                return view('support::support-bubble');
            });
        });
    }
}
