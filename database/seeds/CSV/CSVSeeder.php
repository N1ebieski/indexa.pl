<?php

namespace App\Seeds\CSV;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
     * Undocumented function
     *
     * @param Cache $cache
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;

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
