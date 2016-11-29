<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 27.11.2016
 * Time: 21:09
 */

class Controller
{
    private $encryption;
    private $dbh;
    public function __construct($dbh){
        $this->encryption = new \Encryption();
        $this->dbh = $dbh;
    }

    public function addCustomer($request, $response, $args){
        $validate = new CustomerValidator();
        $data = $request->getParsedBody();
        $customer = new \Customer($data);
        $rep = new \DataLayer($this->dbh);

        if($validate->isValid($customer)){
            $customer->setMobileNumber($this->encryption->encrypt($customer->getMobileNumber()));
            $rep->addCustomer($customer);
            return '{"customer": '. json_encode($data) .'}';
        }else{
            echo '{"errors": ' . json_encode($validate->getErrors()) . '}';
        }
    }

    public function getCustomer($request, $response, $args){
        $rep = new \DataLayer($this->dbh);
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