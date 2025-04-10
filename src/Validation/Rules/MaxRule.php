<?php

namespace Blog\Validation\Rules;

use Blog\Validation\Rule;

class MaxRule implements Rule
{
    public function apply($field, $value, $data = null): bool
    {
        return strlen($value) <= $data;
    }
    public function message(): string
    {
        return "The :attribute must be less than :data characters.";
    }
}
