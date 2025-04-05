<?php 

namespace Blog\Validation\Rules;

use Blog\Model\User;
use Blog\Validation\Rule;

class UniqueRule implements Rule
{
    public function apply($field, $value, $data = null): bool
    {
        $user = new User();
        $emailExisit = $user->emailExists($value);
        return !$emailExisit;
        
    }
    public function message(): string
    {
        return "The :attribute is already taken.";
    }
}