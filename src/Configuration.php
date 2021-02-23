<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelPages;

class Configuration
{
    /**
     * @var string
     */
    protected string $configFile = 'laravel-pages';

    /**
     * The array of class pipes.
     *
     * @var array
     */
    protected array $pipes = [];

    /**
     * Configuration constructor.
     * @param Configuration|null $config
     */
    public function __construct(Configuration $config = null)
    {
        if (is_null($config)) {
            $this->load();
        }
    }

    /**
     * @return $this|Configuration
     */
    public function load(): Configuration
    {
        $pipes = config($this->configFile . '.pipes');
        if(is_array($pipes)){
            $this->setPipes($pipes);
        }
        return $this;
    }

    /**
     * @param array $pipes
     */
    public function setPipes(array $pipes): void
    {
        $this->pipes = [];
        foreach ($pipes as $pipe) {
            //if (get_parent_class($pipe) == AbstractPipes::class) {
                $this->pipes[] = $pipe;
            //}
        }
    }

    /**
     * @param string $pipe
     */
    public function setPipe(string $pipe): void
    {
        if (get_parent_class($pipe) == AbstractPipes::class) {
            $this->pipes[] = $pipe;
        }
    }

    /**
     * @return array
     */
    public function getPipes(): array
    {
        return $this->pipes;
    }
}
