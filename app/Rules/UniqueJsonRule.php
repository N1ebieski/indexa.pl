<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Translation\Translator as Lang;
use Illuminate\Database\DatabaseManager as DB;

class UniqueJsonRule implements Rule
{
    /**
     * Undocumented variable
     *
     * @var DB
     */
    protected $db;

    /**
     * Undocumented variable
     *
     * @var Lang
     */
    protected $lang;

    /**
     * [private description]
     * @var string
     */
    protected $table;

    /**
     * [protected description]
     * @var string
     */
    protected $column;

    /**
     * Undocumented variable
     *
     * @var mixed
     */
    protected $ignore;

    /**
     * Undocumented variable
     *
     * @var array|null
     */
    protected $where;

    /**
     * Undocumented function
     *
     * @param DB $db
     * @param string $table
     * @param string $column
     * @param mixed $ignore
     */
    public function __construct(
        DB $db,
        Lang $lang,
        string $table,
        string $column,
        $ignore = null,
        array $where = null
    ) {
        $this->db = $db;
        $this->lang = $lang;

        $this->table = $table;
        $this->column = $column;
        $this->ignore = $ignore;
        $this->where = $where;
    }

    /**
     * [validate description]
     * @param  [type] $attribute  [description]
     * @param  [type] $value      [description]
     * @param  [type] $parameters [description]
     * @param  [type] $validator  [description]
     * @return [type]             [description]
     */
    public function validate($attribute, $value, $parameters, $validator)
    {
        return $this->passes($attribute, $value);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->db->table($this->table)
            ->whereJsonContains($this->column, $value)
            ->when($this->ignore !== null, function (Builder $query) {
                $query->when(is_array($this->ignore), function ($query) {
                    foreach ($this->ignore as $key => $value) {
                        $query->where($key, '<>', $value);
                    }
                }, function ($query) {
                    $query->where('id', '<>', $this->ignore);
                });
            })
            ->when($this->where !== null, function (Builder $query) {
                foreach ($this->where as $key => $value) {
                    $query->where($key, '=', $value);
                }
            })
            ->count() === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->lang->get('validation.unique');
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function __toString() : string
    {
        return 'unique_json';
    }
}
