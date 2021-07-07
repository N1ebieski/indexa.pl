<?php

namespace App\Seeds\CSV;

use Illuminate\Database\Seeder;
use N1ebieski\IDir\Models\User;
use N1ebieski\IDir\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\Queue;
use N1ebieski\IDir\Models\Field\Field;
use N1ebieski\IDir\Seeds\Traits\Importable;
use Illuminate\Contracts\Cache\Factory as Cache;

class CSVSeeder extends Seeder
{
    use Importable;

    /**
     * Undocumented variable
     *
     * @var Cache
     */
    protected $cache;

    /**
     * Undocumented variable
     *
     * @var Queue
     */
    protected $queue;

    /**
     * Undocumented function
     *
     * @param Cache $cache
     */
    public function __construct(Cache $cache, Queue $queue)
    {
        $this->cache = $cache;
        $this->queue = $queue;

        DB::disableQueryLog();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->setWorkers(
            (int)$this->cache->store('system')->get('workers', 1)
        );

        $this->call(CategoriesSeeder::class);
        $this->call(FieldsSeeder::class);
        $this->call(DirsSeeder::class);
        $this->import();
    }
}
