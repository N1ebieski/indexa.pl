<?php

namespace App\Services;

use App\Models\Dir;
use Illuminate\Database\Eloquent\Model;
use N1ebieski\ICore\Utils\Traits\Decorator;
use Illuminate\Contracts\Config\Repository as Config;
use N1ebieski\IDir\Services\DirService as BaseDirService;

class DirService
{
    use Decorator;

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
     * @param BaseDirService $decorated
     * @param Dir $dir
     * @param Config $config
     */
    public function __construct(BaseDirService $decorated, Dir $dir, Config $config)
    {
        $this->decorated = $decorated;

        $this->setDir($dir);

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
        $this->decorated->setDir($dir);

        $this->dir = $dir;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes) : Model
    {
        $dir = $this->decorated->create($attributes);

        $nip = $this->config->get('idir.field.gus.nip');

        if (isset($attributes['field'][$nip])) {
            $this->dir->gus()->make()
                ->setRelations(['dir' => $this->dir])
                ->makeService()
                ->create(['nip' => $attributes['field'][$nip]]);
        }

        return $dir;
    }

    /**
     * [update description]
     * @param  array $attributes [description]
     * @return bool              [description]
     */
    public function update(array $attributes) : bool
    {
        $nip = $this->config->get('idir.field.gus.nip');

        $this->dir->gus()->make()
            ->setRelations(['dir' => $this->dir])
            ->makeService()
            ->sync(['nip' => $attributes['field'][$nip] ?? null]);

        return $this->decorated->update($attributes);
    }

    /**
     * [update description]
     * @param  array $attributes [description]
     * @return bool              [description]
     */
    public function updateFull(array $attributes) : bool
    {
        $nip = $this->config->get('idir.field.gus.nip');

        $this->dir->gus()->make()
            ->setRelations(['dir' => $this->dir])
            ->makeService()
            ->sync(['nip' => $attributes['field'][$nip] ?? null]);

        return $this->decorated->updateFull($attributes);
    }
}
