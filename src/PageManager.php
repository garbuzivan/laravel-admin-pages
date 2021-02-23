<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelPages;

class PageManager
{
    /**
     * @var Configuration $config
     */
    protected $config;

    /**
     * @var CodeManager $manager
     */
    protected $manager;

    public function __construct(Configuration $config)
    {
        $this->config = $config;
        $this->manager = new CodeManager($config);
    }
}
