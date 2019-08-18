<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/10/2019
 * Time: 9:54 AM
 */


require_once __DIR__.'/../../core/Customer.php';
require_once __DIR__.'/../../db/DBConnection.php';
require_once __DIR__.'/../CustomerRepository.php';

class CustomerRepositoryImpl implements CustomerRepository
{
private $connection;

    public function addCustomer(Customer $customer): bool
    {
        return($this->connection->query(
            "INSERT INTO customer VALUES (
'{$customer->getCid()}',
'{$customer->getName()}',
'{$customer->getAddress()}',
'{$customer->getSalary()}'
)"
        ));
    }

    public function updateCustomer(Customer $customer): bool
    {
        return($this->connection->query(
            "UPDATE  customer  SET  
name='{$customer->getName()}',
address='{$customer->getAddress()}',
salary='{$customer->getSalary()}',
salary='{$customer->getSalary()}' 
WHERE id='{$customer->getCid()}'"));

    }

    public function deleteCustomer($id): bool
    {
        return($this->connection->query("DELETE FROM customer WHERE id='{$id}'"));

    }

    public function getAllCustomer(): Array
    {
        $result =$this->connection->query("SELECT * FROM customer");
        return $result->fetch_all();
    }

    public function searchCustomer($id): Customer
    {
        $result =$this->connection->query("SELECT * FROM customer WHRER id='$id'");
        return $result->fetch_all;
    }


    public function setConnection(mysqli $connection)
    {
         $this->connection=$connection;
    }
}