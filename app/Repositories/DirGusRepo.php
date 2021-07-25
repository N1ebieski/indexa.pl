<?php

namespace App\Repositories;

use Closure;
use Carbon\Carbon;
use App\Models\Dir;
use App\Models\DirGus;
use Illuminate\Contracts\Config\Repository as Config;

class DirGusRepo
{
    /**
     * [private description]
     * @var DirGus
     */
    protected $dirGus;

    /**
     * Undocumented variable
     *
     * @var Config
     */
    protected $config;

    /**
     * Undocumented variable
     *
     * @var Carbon
     */
    protected $carbon;

    /**
     * Undocumented function
     *
     * @param DirGus $dirGus
     * @param Config $config
     * @param Carbon $carbon
     */
    public function __construct(DirGus $dirGus, Config $config, Carbon $carbon)
    {
        $this->dirGus = $dirGus;

        $this->config = $config;
        $this->carbon = $carbon;
    }

    /**
     * Undocumented function
     *
     * @param integer $chunk
     * @param Closure $closure
     * @param string $timestamp
     * @return boolean
     */
    public function chunkAvailableHasNipByAttemptedAt(
        int $chunk,
        Closure $closure,
        string $timestamp
    ) : bool {
        return $this->dirGus
            ->join('dirs', function ($query) {
                $query->on('dirs_gus.dir_id', '=', 'dirs.id')
                    ->whereIn('dirs.status', [Dir::ACTIVE, Dir::STATUS_INACTIVE]);
            })
            ->join('fields_values', function ($query) {
                $query->on('dirs_gus.dir_id', '=', 'fields_values.model_id')
                    ->where('fields_values.model_type', Dir::make()->getMorphClass())
                    ->where('fields_values.field_id', $this->config->get('idir.field.gus.nip'));
            })
            ->where(function ($query) use ($timestamp) {
                $query->whereDate(
                    'attempted_at',
                    '<',
                    $this->carbon->parse($timestamp)->format('Y-m-d')
                )
                ->orWhere(function ($query) use ($timestamp) {
                    $query->whereDate(
                        'attempted_at',
                        '=',
                        $this->carbon->parse($timestamp)->format('Y-m-d')
                    )
                    ->whereTime(
                        'attempted_at',
                        '<=',
                        $this->carbon->parse($timestamp)->format('H:i:s')
                    );
                })
                ->orWhere('attempted_at', null);
            })
            ->orderBy('attempted_at', 'asc')
            ->chunk($chunk, $closure);
    }
}
