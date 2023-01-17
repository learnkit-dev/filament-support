<?php

namespace LearnKit\Support\Settings;

use Spatie\LaravelSettings\Settings;

final class SupportSettings extends Settings
{
    public ?bool $bubble_active;

    public ?string $bubble_website_token;

    public ?string $bubble_base_url;

    public ?bool $bubble_show_user;

    public static function group(): string
    {
        return 'support';
    }
}
