<?php

namespace App\Http\Requests\Web\Dir;

use App\Models\Dir;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use N1ebieski\IDir\Http\Requests\Web\Dir\Store2Request as BaseStore2Request;

class Store2Request extends BaseStore2Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Config::get('idir.field.gus.nip') !== null) {
            return array_merge_recursive(parent::rules(), [
                'field.' . Config::get('idir.field.gus.nip') => [
                    App::make(\App\Rules\UniqueJsonRule::class, [
                        'table' => 'fields_values',
                        'column' => 'value',
                        'where' => [
                            'field_id' => Config::get('idir.field.gus.nip'),
                            'model_type' => Dir::make()->getMorphClass()
                        ]                        
                    ])
                ]
            ]);
        }

        return parent::rules();
    }
}
