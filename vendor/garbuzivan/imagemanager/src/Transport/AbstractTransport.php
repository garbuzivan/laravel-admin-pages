<?php

declare(strict_types=1);

namespace GarbuzIvan\ImageManager\Transport;

use GarbuzIvan\ImageManager\Configuration;

abstract class AbstractTransport
{
    /**
     * @var Configuration $config
     */
    protected $config;

    /**
     * @var array|null
     */
    protected $image = null;

    /**
     * AbstractTransport constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param string $hash
     * @return bool
     */
    abstract public function existsHash(string $hash): bool;

    /**
     * Search image by hash
     *
     * @param string $hash
     * @return array
     */
    abstract public function getByHash(string $hash): ?array;

    /**
     * Search image by id
     *
     * @param int $id
     * @return array
     */
    abstract public function getByID(int $id): ?array;

    /**
     * Search image by filesize (bytes)
     *
     * @param int $minBytes
     * @param int $maxBytes
     * @param int $limit
     * @param int $page
     * @return array
     */
    abstract public function getBySize(int $minBytes, int $maxBytes, int $limit, int $page): array;

    /**
     * Search for an image by a range of width and height
     *
     * @param int $minWidth
     * @param int $maxWidth
     * @param int $minHeight
     * @param int $maxHeight
     * @param int $limit
     * @param int $page
     * @return array
     */
    abstract public function getRange(int $minWidth, int $maxWidth, int $minHeight, int $maxHeight, int $limit, int $page): array;

    /**
     * Search for an image by a title
     *
     * @param string|null $title
     * @param int $limit
     * @param int $page
     * @return array
     */
    abstract public function getTitle(string $title, int $limit, int $page): array;

    /**
     * Save image to DB
     *
     * @param array $image
     * @return int - ID image
     */
    abstract public function save(array $image): int;

    /**
     * Update cache size image info in db
     *
     * @param array $image
     * @return void
     */
    abstract public function update(array $image): void;

    /**
     * Set use image in component item
     *
     * @param array $images
     * @param int $item
     * @param string $component
     */
    abstract public function setUse(array $images = [], int $item = 0, string $component = 'default'): void;

    /**
     * Drop use image in component item
     *
     * @param array $images
     * @param int $item
     * @param string $component
     */
    abstract public function dropUse(array $images = [], int $item = 0, string $component = 'default'): void;

    /**
     * @param int $id
     */
    abstract public function dropImage(int $id): void;

    /**
     * Get use image in component item
     *
     * @param int $item
     * @param string $component
     * @return array
     */
    abstract public function getUse(int $item, string $component): array;
}
