<?php

namespace App\Filesystem;

/**
 * @version   1.0.1
 * @author    shakidevcom
 * @copyright 2018, shakidevcom
 */
class Source
{

    /**
     * @var string
     */
    private $basePath = 'storage';

    /**
     * @var
     */
    protected $path;


    /**
     * Source constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->setPath($path);
    }


    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }


    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $this->basePath . "/" . trim($path, '/');
    }

}
