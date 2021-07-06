<?php

namespace App\Seeds\CSV;

use App\Seeds\CSV\CSVSeeder;
use N1ebieski\IDir\Models\Field\Group\Field;
use Illuminate\Support\Facades\DB;
use N1ebieski\IDir\Models\Group;

class FieldsSeeder extends CSVSeeder
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected const PATTERN = [
        'Miasto' => [
            'type' => 'input'
        ],
        'Ulica' => [
            'type' => 'input'
        ],
        'Kod pocztowy' => [
            'type' => 'input'
        ],
        'Telefon' => [
            'type' => 'input',
        ],
        'REGON' => [
            'type' => 'input',
        ],
        'NIP' => [
            'type' => 'input'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            foreach (static::PATTERN as $key => $value) {
                $field = Field::firstWhere('title', $key);

                if ($field === null) {
                    $field = Field::make();

                    $field->title = $key;
                    $field->visible = Field::VISIBLE;
                    $field->type = $value['type'];
                    $field->options = $this->options($value);
    
                    $field->save();
    
                    $field->morphs()->attach(Group::DEFAULT);
                }
            }
        });
    }

    /**
     * Undocumented function
     *
     * @param array $item
     * @return array
     */
    protected static function options(array $item) : array
    {
        if ($item['type'] === 'input') {
            $options['min'] = $item['min'] ?? 3;
            $options['max'] = $item['max'] ?? 255;
        }

        if ($item['type'] === 'textarea') {
            $options['min'] = $item['min'] ?? 3;
            $options['max'] = $item['max'] ?? 5000;
        }

        if (in_array($item['type'], ['select', 'checkbox']) && !empty($item['options'])) {
            $options['options'] = $item['options'];
        }

        $options['required'] = Field::OPTIONAL;

        if ($item['type'] === 'image') {
            $options['width'] = $item['width'] ?? 720;
            $options['height'] = $item['height'] ?? 480;
            $options['size'] = $item['size'] ?? 2048;
        }

        return $options;
    }
}
