<?php

namespace App\Services\Factories;

use App\Models\Dir;
use N1ebieski\IDir\Models\Field\Dir\Field;
use Illuminate\Contracts\Config\Repository as Config;

class NipFactory
{
    /**
     * Undocumented variable
     *
     * @var Dir
     */
    protected $dir;

    /**
     * Undocumented variable
     *
     * @var Config
     */
    protected $config;

    /**
     * Undocumented function
     *
     * @param Dir $dir
     * @param Config $config
     */
    public function __construct(Dir $dir, Config $config)
    {
        $this->dir = $dir;

        $this->config = $config;
    }

    /**
     * Undocumented function
     *
     * @param Dir $dir
     * @return self
     */
    public function setDir(Dir $dir)
    {
        $this->dir = $dir;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return Field|null
     */
    public function makeNip() : ?Field
    {
        return $this->dir->fields->firstWhere('id', $this->config->get('idir.field.gus.nip'));
    }
}