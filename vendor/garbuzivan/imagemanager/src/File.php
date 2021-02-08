<?php

declare(strict_types=1);

namespace GarbuzIvan\ImageManager;

use GarbuzIvan\ImageManager\Exceptions\MakeDirectoryException;

class File
{
    /**
     * @param string $path
     * @param int $mode
     * @return bool
     * @throws MakeDirectoryException
     */
    public function makeDirectory(string $path, $mode = 0777): bool
    {
        if(!file_exists($path)){
            mkdir($path, $mode, true);
        }
        if(file_exists($path)){
            return true;
        } else {
            throw new MakeDirectoryException(ExceptionCode::$MAKE_DIRECTORY);
        }

    }

    /**
     * @param $file
     * @param $output
     * @return bool
     */
    public function save($file, $output): bool
    {
        file_put_contents($file, $output);
        return file_exists($file);
    }

    /**
     * @param $string
     * @return string
     */
    public function getMimeTypeFromString($string): string
    {
        return (new \finfo(FILEINFO_MIME_TYPE))->buffer($string);
    }

    /**
     * @param $string
     * @param $mimeTypes
     * @return string
     */
    public function getExtensionFromString($string, $mimeTypes): string
    {
        $mimeType = $this->getMimeTypeFromString($string);
        return array_search($mimeType, $mimeTypes);
    }

    /**
     * @param string|null $name
     * @param string $hash
     * @param string $extension
     * @return string
     */
    public function getNameImage(?string $name, string $hash, string $extension): string
    {
        $name = preg_replace('~[^0-9a-zA-Z-_\.]~isuU', '', $name);
        $name = mb_strlen($name) == 0 ? $hash : $name;
        $name = str_ireplace($extension, '', $name) . $extension;
        return $name;
    }
}
