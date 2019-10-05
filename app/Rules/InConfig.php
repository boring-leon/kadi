<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InConfig implements Rule
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
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
        return in_array($value, config($this->key));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Proszę podać istniejący :attribute';
    }
}
