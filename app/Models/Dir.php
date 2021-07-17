<?php

namespace App\Models;

use App\Services\DirService;
use Illuminate\Support\Facades\App;
use N1ebieski\IDir\Models\Dir as BaseDir;

class Dir extends BaseDir
{
    // Configuration

    /**
     * Get the class name for polymorphic relations.
     *
     * @return string
     */
    public function getMorphClass()
    {
        return BaseDir::class;
    }

    // Relations

    /**
     * [status description]
     * @return [type] [description]
     */
    public function gus()
    {
        return $this->hasOne(\App\Models\DirGus::class);
    }

    // Makers

    /**
     * [makeService description]
     * @return DirService [description]
     */
    public function makeService()
    {
        return App::make(DirService::class, ['dir' => $this]);
    }    
}
