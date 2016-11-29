<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 27.11.2016
 * Time: 19:30
 */


class Customer
{
    private $email;
    private $mobile_number;
    private $customer_name;
    private $age;
    private $address;
    private $city;
    private $zip_code;
    private $something_1;
    private $something_2;

    public function Customer($data = array())
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMobileNumber()
    {
        return $this->mobile_number;
    }

    public function setMobileNumber($mobile_number)
    {
        $this->mobile_number = $mobile_number;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCustomerName()
    {
        return $this->customer_name;
    }

    public function setCustomerName($customer_name)
    {
        $this->customer_name = $customer_name;
    }

    public function getZipCode()
    {
        return $this->zip_code;
    }

    public function setZipCode($zip_code)
    {
        $this->zip_code = $zip_code;
    }

    public function getSomething1()
    {
        return $this->something_1;
    }

    public function setSomething1($something_1)
    {
        $this->something_1 = $something_1;
    }

    public function getSomething2()
    {
        return $this->something_2;
    }

    public function setSomething2($something_2)
    {
        $this->something_2 = $something_2;
    }
}