<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelPages;

class PageManager
{
    /**
     * @var Configuration $config
     */
    protected $config;

    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }

    public function getAll()
    {

    }
}
