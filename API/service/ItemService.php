<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/21/2019
 * Time: 1:52 PM
 */

require_once __DIR__.'/../core/Item.php';
require_once __DIR__.'/../business/impl/ItemBOImpl.php';


$operation =$_POST['operation'];
$itemBo=new ItemBOImpl();

switch ($operation){

    case "saveItem":
        $itemid = $_POST['iid'];
        $itemname= $_POST['name'];
        $itemPrice= $_POST['qty'];
        $ItemQty=$_POST['price'];

        $custnameTemobject = new Item(
            $itemid,
            $itemname,
            $ItemQty,
            $itemPrice
        );
        $result = $itemBo->addItem($custnameTemobject);
        if ($result){
            echo "add Item";
        }else{
            echo "not added";
        };
        break;
    case "updateItem":

        $itemid = $_POST['iid'];
        $itemname= $_POST['name'];
        $itemPrice= $_POST['qty'];
        $ItemQty=$_POST['price'];

        $custnameTemobject = new Customer(
            $itemid,
            $itemname,
            $ItemQty,
            $itemPrice
        );
        $result = $itemBo->updateItem($custnameTemobject);
        if ($result){
            echo "update Item";
        }else{
            echo "not Update";
        };
        break;
    case "deleteItem":
        $itemid = $_POST['iid'];

        $result = $itemBo->deleteItem($custnameTemobject);
        if ($result){
            echo "Delete Item";
        }else{
            echo "not Delete";
        };
        break;
    case "search" :
        $code = $_POST['code'];
        $res = json_encode($itemBo->searchItem($code));
        echo $res;
        break;
    case "getAll":
         $ii= json_encode($itemBo->getAllItem());
         echo $ii;
        break;
    default:
        null;
}

