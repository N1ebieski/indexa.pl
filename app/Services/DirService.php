<?php

namespace App\Services;

use App\Models\Dir;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Auth\Guard as Auth;
use Illuminate\Database\DatabaseManager as DB;
use Illuminate\Contracts\Container\Container as App;
use Illuminate\Contracts\Config\Repository as Config;
use N1ebieski\IDir\Services\DirService as BaseDirService;

class DirService extends BaseDirService
{
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
     * @param Session $session
     * @param Carbon $carbon
     * @param Auth $auth
     * @param DB $db
     * @param App $app
     */
    public function __construct(
        Dir $dir,
        Session $session,
        Carbon $carbon,
        Auth $auth,
        DB $db,
        App $app,
        Config $config
    ) {
        $this->config = $config;

        parent::__construct(
            $dir,
            $session,
            $carbon,
            $auth,
            $db,
            $app
        );
    }

    /**
     * Undocumented function
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes) : Model
    {
        $dir = parent::create($attributes);

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

        return parent::update($attributes);
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

        return parent::updateFull($attributes);
    }
}
