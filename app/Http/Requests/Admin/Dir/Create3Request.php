<?php

namespace App\Http\Requests\Admin\Dir;

use App\Models\Dir;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use N1ebieski\IDir\Http\Requests\Admin\Dir\Create3Request as BaseCreate3Request;

class Create3Request extends BaseCreate3Request
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
