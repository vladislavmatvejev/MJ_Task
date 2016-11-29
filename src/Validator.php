<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 27.11.2016
 * Time: 20:15
 */

class Validator
{
    private $errors;

    public function __construct(){
        $this->errors = array();
    }

    public function setError($error, $msg){
        if(empty($this->errors[$error])){
            $this->errors[$error] = array();
        }
        $this->errors[$error][] = $error . ' ' . $msg;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors(){
        return !empty($this->errors);
    }
}