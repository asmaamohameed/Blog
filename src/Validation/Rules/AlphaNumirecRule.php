<?php

namespace Blog\Validation\Rules;

use Blog\Validation\Rule;

class AlphaNumirecRule implements Rule
{
    public function apply($field, $value, $data = null): bool
    {
        return preg_match('/^[\pL\pM\pN]+$/u', $value);
    }

    public function message(): string
    {
        return "The :attribute only allows alphabetic and numeric characters.";
    }
}
