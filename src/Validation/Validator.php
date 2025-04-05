<?php

namespace Blog\Validation;

use Blog\Validation\Rules\RequiredRule;
use Blog\Validation\Rules\UniqueRule;
use Blog\Validation\Rules\ConfirmedRule;
use Blog\Validation\Rules\EmailRule;
use Blog\Validation\Rules\MinRule;
use Blog\Validation\Rules\MaxRule;
use Blog\Validation\Rules\NumericRule;
use Blog\Validation\Rules\AlphaNumirecRule;

class Validator
{
    protected $errors = [];
    protected $rules = [];
    protected $map = [];

    public function __construct()
    {
        $this->map = [
            'required' => new RequiredRule(),
            'unique' => new UniqueRule(),
            // 'confirmed' => new ConfirmedRule(),
            'email' => new EmailRule(),
            'min' => new MinRule(),
            'max' => new MaxRule(),
            'numeric' => new NumericRule(),
            'alphaNumirec' => new AlphaNumirecRule(),
        ];
    }
    public function setRules(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }

    public function validate(array $data)
    {
        foreach ($this->rules as $field => $fieldRules) {
            $rules = explode('|', $fieldRules);
            foreach ($rules as $rule) {
                $ruleParts = is_string($rule) ? explode(':', $rule) : $rule;
                $ruleName = $ruleParts[0];
                $ruleValue = $ruleParts[1] ?? null;

                $ruleInstance = $this->map[$ruleName];

                if (!isset($ruleInstance)) {
                    throw new \Exception("Rule {$ruleName} is not supported");
                }

                $vaild = $ruleInstance->apply($field, trim($data[$field]), $ruleValue);

                if (!$vaild) {
                    $this->errors[$field][] = str_replace([':attribute', ':data'], [$field, $ruleValue], $ruleInstance->message());
                }
            }
        }
        return $this;
    }

    public function fails()
    {
        return !empty($this->errors);
    }
    public function errors()
    {
        return $this->errors;
    }
}
