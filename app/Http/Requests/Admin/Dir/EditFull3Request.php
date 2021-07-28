<?php

namespace App\Http\Requests\Admin\Dir;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use N1ebieski\IDir\Http\Requests\Admin\Dir\EditFull3Request as BaseEditFull3Request;

class EditFull3Request extends BaseEditFull3Request
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
                        'ignore' => [
                            'model_id' => $this->dir->id
                        ],
                        'where' => [
                            'field_id' => Config::get('idir.field.gus.nip'),
                            'model_type' => $this->dir->getMorphClass()
                        ]
                    ])
                ]
            ]);
        }

        return parent::rules();
    }
}
