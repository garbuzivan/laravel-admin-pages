<?php

namespace GarbuzIvan\LaravelPages\Contracts;

interface PluginInterface
{
    /**
     * Регистрация плагина
     */
    public function register(): void;
}
