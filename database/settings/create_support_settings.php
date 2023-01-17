<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('support.bubble_active', false);
        $this->migrator->add('support.bubble_website_token', '');
        $this->migrator->add('support.bubble_show_user', false);
    }
};
