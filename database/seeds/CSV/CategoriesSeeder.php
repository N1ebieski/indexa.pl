<?php

namespace App\Seeds\CSV;

use App\Seeds\CSV\CSVSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;
use N1ebieski\IDir\Models\Category\Dir\Category;

class CategoriesSeeder extends CSVSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LazyCollection::make(function () {
            $filePath = storage_path('app/csv/categories.csv');
            $handle = fopen($filePath, 'r');

            while ($line = fgetcsv($handle, 0, ';')) {
                yield $line;
            }
        })
        ->each(function ($item) {
            DB::transaction(function () use ($item) {
                $cat = [];

                for ($i = 0; $i < count($item); $i++) {
                    $cat[$i] = Category::firstWhere('name', $item[$i]);

                    if ($cat[$i] === null) {
                        $cat[$i] = Category::make();

                        $cat[$i]->name = $item[$i];
                        $cat[$i]->status = Category::ACTIVE;
                        $cat[$i]->parent_id = isset($cat[$i-1]) ? $cat[$i-1]->id : null;

                        $cat[$i]->save();
                    }
                }
            });
        });
    }
}
