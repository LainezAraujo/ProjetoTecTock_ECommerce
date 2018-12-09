<?php

namespace App\Domain\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class ModelAbstract extends Eloquent
{
    protected $errors;
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {});
    }
    public function validate()
    {
        $validator = app('validator');
        $validate = $validator->make($this->attributesToArray(), $this->rules());
        $this->extendValidator($validate);
        if ($validate->passes()) {
            return true;
        }
        $this->setErrors($validate->messages());
        return false;
    }
    public function rules()
    {
        return [];
    }
    public function messages()
    {
        return [];
    }
    public function extendValidator()
    {
        return;
    }
    public function getErrors()
    {
        return $this->errors;
    }
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }
    public function hasErrors()
    {
        return !empty($this->errors);
    }
}