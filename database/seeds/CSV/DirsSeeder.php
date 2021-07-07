<?php

namespace App\Seeds\CSV;

use App\Seeds\CSV\CSVSeeder;
use App\Seeds\CSV\Jobs\DirsJob;
use Illuminate\Support\LazyCollection;

class DirsSeeder extends CSVSeeder
{
    /**
     * Undocumented variable
     *
     * @var boolean
     */
    protected static $header = true;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LazyCollection::make(function () {
            $filePath = storage_path('app/csv/dirs.csv');
            $handle = fopen($filePath, 'r');

            while ($line = fgetcsv($handle, 0, ';')) {
                if (static::$header === true) {
                    $header = $line;

                    static::$header = false;

                    continue;
                }

                $newLine = [];

                $line = array_walk($line, function ($value, $key) use ($header, &$newLine) {
                    if (!empty($header[$key]) && !isset($newLine[$header[$key]])) {
                        $newLine[$header[$key]] = null;
                    }

                    if (!empty($header[$key]) && !empty($value)) {
                        $newLine[$header[$key]] = $value;
                    }
                });

                yield $newLine;
            }
        })
        ->chunk(1000)
        ->each(function ($items) {
            DirsJob::dispatch($items)->onQueue('import');
        });
    }
}
