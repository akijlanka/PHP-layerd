<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/10/2019
 * Time: 9:52 AM
 */

require_once __DIR__.'/../core/Customer.php';

interface CustomerRepository
{
 public function addCustomer(Customer $customer):bool;
 public function updateCustomer(Customer $customer):bool;
 public function deleteCustomer($id):bool;
 public function searchCustomer($id):Customer;
 public function getAllCustomer():Array;
 public function setConnection(mysqli $connection);
}