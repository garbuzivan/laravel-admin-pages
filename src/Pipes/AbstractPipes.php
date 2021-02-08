<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelAdminPages\Pipes;

use Closure;
use GarbuzIvan\LaravelAdminPages\PageStatus;

abstract class AbstractPipes
{
    /**
     * @param PageStatus $auth
     * @param Closure $next
     * @return mixed
     */
    public function handler(PageStatus $auth, Closure $next)
    {

    }
}
