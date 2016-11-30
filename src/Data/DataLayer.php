<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 27.11.2016
 * Time: 19:11
 */
namespace Data;

class DataLayer
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCustomer($type, $value){
        try {
            $sql = $this->db->select()
                ->from('customers')
                ->where($type , '=', $value);
            $stmt = $sql->execute();
            $data = $stmt->fetchAll();
            return $data;
        } catch(PDOException $e) {
            return '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function addCustomer(\Modeling\Customer $model){
        $fields = array('customer_name', 'email', 'mobile_number', 'age', 'address', 'city', 'zip_code', 'something_1', 'something_2');
        $values = array($model->getCustomerName(), $model->getEmail(), $model->getMobileNumber(), $model->getAge(), $model->getAddress(), $model->getCity(), $model->getZipCode(), $model->getSomething1(), $model->getSomething2());
        try {
            $sql = $this->db->insert($fields)
                ->into('customers')
                ->values($values);
            $sql->execute();
            return true;
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}