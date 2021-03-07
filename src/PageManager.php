<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelPages;

use Illuminate\Database\Eloquent\Builder;

class PageManager
{
    /**
     * @var Configuration $config
     */
    protected Configuration $config;

    /**
     * @var Builder $builder
     */
    protected Builder $builder;

    /**
     * PageManager constructor.
     * @param Configuration $config
     */
    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }

    /**
     * Получить список всех страниц
     *
     * @return bool
     */
    public function getAll(): bool
    {
        return true;
    }

    /**
     * Получить страницу по ID
     *
     * @return bool
     */
    public function getByID(): bool
    {
        return true;
    }

    /**
     * Получить страницу по slug (URL идентификатор страницы)
     *
     * @return bool
     */
    public function getBySlug(): bool
    {
        return true;
    }
}
