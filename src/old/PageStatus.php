<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelAdminPages;

class PageStatus
{
    /**
     * @var Configuration|null
     */
    public ?Configuration $config = null;

    /**
     * Configuration constructor.
     * @param array|null $auth
     * @param Configuration|null $config
     */
    public function __construct(array $auth = null, ?Configuration $config = null)
    {
        if (!is_null($auth)) {
            $this->setArg($auth);
        }
        $this->config = $config ?? new Configuration();
    }
}
