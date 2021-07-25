<?php

namespace App\Http\Requests\Admin\Dir;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use N1ebieski\IDir\Http\Requests\Admin\Dir\Store2Request as BaseStore2Request;

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
                        'column' => 'value'
                    ])
                ]
            ]);
        }

        return parent::rules();
    }
}
