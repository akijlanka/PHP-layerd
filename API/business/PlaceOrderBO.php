<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/11/2019
 * Time: 10:45 AM
 */

require_once __DIR__.'/../core/Order.php';
require_once __DIR__.'/../core/OrderDetails.php';

interface PlaceOrderBO
{
    public function placeOrder(Order $order,$arr):bool ;
    public function getAllOrders():array ;
}