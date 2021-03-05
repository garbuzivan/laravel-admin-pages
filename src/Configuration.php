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
    protected array $plugins = [];

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
        $plugins = config($this->configFile . '.plugins');
        if (is_array($plugins)) {
            $this->setPlugins($plugins);
        }
        return $this;
    }

    /**
     * @param array $plugins
     */
    public function setPlugins(array $plugins): void
    {
        $this->plugins = $plugins;
    }

    /**
     * @param string $plugin
     */
    public function setPlugin(string $plugin): void
    {
        $this->plugins[] = $plugin;
    }

    /**
     * @return array
     */
    public function getPlugins(): array
    {
        return $this->plugins;
    }
}
