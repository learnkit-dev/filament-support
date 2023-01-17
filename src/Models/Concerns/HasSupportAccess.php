<?php

namespace LearnKit\Support\Models\Concerns;

trait HasSupportAccess
{
    public function canUseSupportBubble(): bool
    {
        return true;
    }
}
