<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelAdminPages;

class LaravelAdminPages
{
    /**
     * @var Configuration $config
     */
    protected Configuration $config;

    /**
     * Configuration constructor.
     * @param Configuration|null $config
     */
    public function __construct(?Configuration $config = null)
    {
        $this->config = $config ?? new Configuration();
    }
}
