<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 27.11.2016
 * Time: 21:09
 */
namespace Controllers;
use Modeling\Customer;
class Controller
{
    private $encryption;
    private $dbh;
    public function __construct($dbh){
        $this->encryption = new \Encryption\Encryption();
        $this->dbh = $dbh;
        header('Content-type: application/json');
    }

    public function addCustomer($request, $response, $args){
        $validate = new \Validation\CustomerValidator();
        $data = $request->getParsedBody();
        $customer = new Customer($data);
        $rep = new \Data\DataLayer($this->dbh);

        if($validate->isValid($customer)){
            $customer->setMobileNumber($this->encryption->encrypt($customer->getMobileNumber()));
            $rep->addCustomer($customer);
            $result['customer'] = $data;
            return json_encode($result);
        }else{
            $result['errors'] = $validate->getErrors();
            return  json_encode($result);
        }
    }

    public function getCustomer($request, $response, $args){
        $rep = new \Data\DataLayer($this->dbh);
        $result = $rep->getCustomer($args['type'], $args['value']);
        foreach($result as $key=>$value){
            $result[$key]['mobile_number'] = $this->showNumber($this->encryption->decrypt($value['mobile_number']));
        }
        return json_encode($result);
    }
    function showNumber($number, $maskingCharacter = '*') {
        return str_repeat($maskingCharacter, strlen($number) - 4) . substr($number, -4);
    }
}
