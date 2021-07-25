<?php

namespace App\Models;

use App\Services\DirGusService;
use App\Repositories\DirGusRepo;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class DirGus extends Model
{
    // Configuration

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['attempted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dirs_gus';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'attempted_at' => null
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dir_id' => 'integer',
        'attempted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relations

    /**
     * [dir description]
     * @return [type] [description]
     */
    public function dir()
    {
        return $this->belongsTo(\App\Models\Dir::class);
    }

    // Makers

    /**
     * [makeService description]
     * @return DirGusRepo [description]
     */
    public function makeRepo()
    {
        return App::make(DirGusRepo::class, ['dirGus' => $this]);
    }

    /**
     * [makeService description]
     * @return DirGusService [description]
     */
    public function makeService()
    {
        return App::make(DirGusService::class, ['dirGus' => $this]);
    }
}
