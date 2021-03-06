<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CodesRegExp implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return preg_match("/^([0-9]{10}(,|,\r\n|\r\n))+[0-9]{10}$/", $value)
            || preg_match("/^[0-9]{10}$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return "Input is invalid";
    }
}
