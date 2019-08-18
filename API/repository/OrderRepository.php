<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/10/2019
 * Time: 9:52 AM
 */
require_once __DIR__.'/../core/Order.php';

interface OrderRepository
{
    public function addOrder(Order $order):bool ;
    public function deleteOrder($oid):bool ;
    public function updateOrder($order):bool ;
    public function searchOrder($oid):Customer;
    public function getAllOrder():array ;
    public function setConnection(mysqli $connection);

}