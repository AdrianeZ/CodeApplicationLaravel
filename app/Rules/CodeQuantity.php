<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CodeQuantity implements Rule
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
        $quantity = (int)$value;
        if ($quantity < 1 || $quantity > 10) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return "You can generate only between 1 and 10 codes";
    }
}
