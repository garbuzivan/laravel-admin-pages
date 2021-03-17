<?php

namespace GarbuzIvan\LaravelPages\Contracts;

interface RepositoryInterface
{
    /**
     * Регистрация плагина
     */
    public function register(): void;
}
