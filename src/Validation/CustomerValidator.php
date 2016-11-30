<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 27.11.2016
 * Time: 20:19
 */
namespace Validation;

class CustomerValidator extends Validator
{
    public function __construct(){
        parent::__construct();
    }

    public function isValid(\Modeling\Customer $model){
        if(empty($model->getEmail())){
            $this->setError('Email', ' is required.');
        }

        if(empty($model->getMobileNumber())){
            $this->setError('Mobile number', ' is required.');
        }

        if(!$this->checkEmail($model->getEmail())){
            $this->setError('Email', ' is not valid. Please enter valid email.');
        }
        if(!$this->validateNumber($model->getMobileNumber())){
            $this->setError('Mobile number', 'is not valid. Please use GB phone number format.');
        }
        return !$this->hasErrors();
    }

    // validate email
    function checkEmail($email) {
        if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", $email)) {
            return false;
        } else {
            return true;
        }
    }

    // check phone number format
    function validateNumber($number){
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        try {
            $gbNumberProto = $phoneUtil->parse($number, "GB");
        } catch (\libphonenumber\NumberParseException $e) {
            return ($e);
        }
        $isValid = $phoneUtil->isValidNumber($gbNumberProto);
        return $isValid;
    }
}