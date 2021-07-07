<?php

namespace App\Crons\Stat\Dir;

use N1ebieski\IDir\Models\Stat\Dir\Stat;
use Illuminate\Database\DatabaseManager as DB;

class StatCron
{
    /**
     * [private description]
     * @var Stat
     */
    protected $stat;
    
    /**
     * Undocumented variable
     *
     * @var DB
     */
    protected $db;

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected const PATTERN = [
        Stat::VIEW => [1, 50],
        Stat::CLICK => [1, 20]
    ];

    /**
     * Undocumented function
     *
     * @param Stat $stat
     * @param DB $db
     */
    public function __construct(Stat $stat, DB $db)
    {
        $this->stat = $stat;

        $this->db = $db;
    }

    /**
     * [__invoke description]
     */
    public function __invoke() : void
    {
        $this->db->transaction(function () {
            foreach ([Stat::VIEW, Stat::CLICK] as $type) {
                static::validate($type);

                $value = isset(static::PATTERN[$type][1]) ?
                    'FLOOR(' . static::PATTERN[$type][0] . ' + RAND() * ' . static::PATTERN[$type][1] . ')'
                    : static::PATTERN[$type];

                $stat = $this->stat->makeRepo()->firstBySlug($type);

                $this->stat->morphs()
                    ->newPivotStatement()
                    ->where([
                        ['stat_id', '=', $stat->id],
                        ['model_type', '=', $stat->model_type]
                    ])
                    ->update([
                        'value' => $this->db->raw("`value` + {$value}")
                    ]);
            }
        });
    }

    /**
     * Undocumented function
     *
     * @param string $type
     * @return void
     */
    protected static function validate(string $type) : void
    {
        if (!isset(static::PATTERN[$type])) {
            throw new \Exception('Pattern does not exist');
        }

        if (isset(static::PATTERN[$type][1]) && !is_int(static::PATTERN[$type][1])) {
            throw new \Exception('Second value of array must be integer');
        }

        if (!is_array(static::PATTERN[$type]) && !is_int(static::PATTERN[$type])) {
            throw new \Exception('Value must be integer');
        }
    }
}
