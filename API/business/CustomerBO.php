<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/11/2019
 * Time: 10:46 AM
 */

require_once __DIR__.'/../core/Customer.php';

interface CustomerBO
{
    public function addCustomer(Customer $customer):bool;
    public function updateCustomer(Customer $customer):bool;
    public function deleteCustomer($id):bool;
    public function searchCustomer($id):Customer;
    public function getAllCustomer():Array;
}