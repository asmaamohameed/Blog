<?php

namespace Blog\Validation;

interface Rule
{
    public function apply($field, $value, $data = null): bool;
    public function message(): string;
}
