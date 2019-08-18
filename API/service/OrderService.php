<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/29/2019
 * Time: 9:23 AM
 */

require_once __DIR__.'/../core/Order.php';
require_once __DIR__.'/../core/OrderDetails.php';
require_once __DIR__.'/../business/impl/PlaceOrderBOImpl.php';


    $operation = $_POST['operation'];

    switch ($operation){
        case "add":
            $oid = $_POST['oid'];
            $date = date("Y-m-d");
            $cid=$_POST['cid'];
            $tbldata=json_decode($_POST['x']);

            $orderBO = new PlaceOrderBOImpl();

            $tempObj= new Order($oid,$date,$cid);

            $res=$orderBO->placeOrder($tempObj,$tbldata);

            if ($res){
                echo "Success";
            }else{
                echo "failed";
            }
            break;
        case "getAll":
            $orderBO = new PlaceOrderBOImpl();
            $res = json_encode($orderBO->getAllOrders());
            echo $res;
            break;
    }


