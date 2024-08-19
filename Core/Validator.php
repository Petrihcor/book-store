<?php

namespace App;

class Validator
{
    private array $errors;

    public function required($value, string $fieldName)
    {
        if (empty($value)) {
           $this->errors[$fieldName][] = 'Это поле обязательно';
        }
        return $this;
    }

    public function min($value, int $min, string $fieldName)
    {
        if (strlen($value)<$min) {
            $this->errors[$fieldName][] = "В этом поле должно быть от $min символов";
        }
        return $this;
    }

    public function max($value, int $max, string $fieldName)
    {
        if (strlen($value) > $max) {
            $this->errors[$fieldName][] = "В этом поле должно быть до $max символов";
        }
        return $this;
    }

    public function numeric($value, string $field)
    {
        if (!ctype_digit($value)) {
            $this->errors[$field][] = "это поле должно содержать только цифры";
        }
        return $this;
    }
    public function email($value, string $fieldName)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$fieldName][] = 'This field must be a valid email address.';
        }
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors() :bool
    {
        return !empty($this->errors);
    }

}