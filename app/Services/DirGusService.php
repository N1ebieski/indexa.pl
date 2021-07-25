<?php

namespace App\Services;

use App\Models\DirGus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DatabaseManager as DB;
use N1ebieski\ICore\Services\Interfaces\Creatable;
use Illuminate\Contracts\Config\Repository as Config;

class DirGusService implements Creatable
{
    /**
     * [private description]
     * @var DirGus
     */
    protected $dirGus;

    /**
     * Undocumented variable
     *
     * @var DB
     */
    protected $db;

    /**
     * Undocumented variable
     *
     * @var Config
     */
    protected $config;

    /**
     * Undocumented function
     *
     * @param DirGus $dirGus
     * @param DB $db
     * @param Config $config
     */
    public function __construct(DirGus $dirGus, DB $db, Config $config)
    {
        $this->dirGus = $dirGus;

        $this->db = $db;
        $this->config = $config;
    }

    /**
     * [create description]
     * @param  array $attributes [description]
     * @return Model             [description]
     */
    public function create(array $attributes) : Model
    {
        return $this->db->transaction(function () use ($attributes) {
            $this->dirGus->dir()->associate($this->dirGus->dir);
            $this->dirGus->save();

            return $this->dirGus;
        });
    }

    /**
     * [sync description]
     * @param  array  $attributes [description]
     * @return Model|null             [description]
     */
    public function sync(array $attributes) : ?Model
    {
        if (!$this->isNip($attributes)) {
            $this->clear();

            return null;
        }

        if (!$this->isSync($attributes)) {
            return null;
        }

        return $this->db->transaction(function () use ($attributes) {
            $this->clear();

            return $this->create($attributes);
        });
    }

    /**
     * [clear description]
     * @return int [description]
     */
    public function clear() : int
    {
        return $this->db->transaction(function () {
            return $this->dirGus->where('dir_id', $this->dirGus->dir->id)->delete();
        });
    }

    /**
     * Undocumented function
     *
     * @param array $attributes
     * @return boolean
     */
    protected function isNip(array $attributes) : bool
    {
        return isset($attributes['nip']);
    }

    /**
     * Undocumented function
     *
     * @param array $attributes
     * @return boolean
     */
    protected function isSync(array $attributes) : bool
    {
        $field = $this->dirGus->dir->fields->firstWhere(
            'id',
            $this->config->get('idir.field.gus.nip')
        );

        return optional($field)->decode_value !== $attributes['nip'];
    }
}
