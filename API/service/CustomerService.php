<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/10/2019
 * Time: 9:49 AM
 */

require_once __DIR__.'/../core/Customer.php';
require_once __DIR__.'/../business/impl/CustomerBOImpl.php';


    $operation =$_POST['operation'];
    $customerBO=new CustomerBOImpl();

    switch ($operation){
        case "saveCust":

            $customerid = $_POST['id'];
            $customername= $_POST['name'];
            $customerAddress= $_POST['address'];
            $customersalary=$_POST['salary'];

            $custnameTemobject = new Customer(
              $customerid,
              $customername,
              $customerAddress,
              $customersalary
            );
            $result = $customerBO->addCustomer($custnameTemobject);
            if ($result){
                echo "add Customer";
            }else{
                echo "not added";
            };
            break;
        case "updateCust":

            $customerid = $_POST['id'];
            $customername= $_POST['name'];
            $customerAddress= $_POST['address'];
            $customersalary=$_POST['salary'];

            $custnameTemobject = new Customer(
                $customerid,
                $customername,
                $customerAddress,
                $customersalary
            );
            $result = $customerBO->updateCustomer($custnameTemobject);
            if ($result){
                echo "update Customer";
            }else{
                echo "not Update";
            };
            break;
        case "deleteCust":
            $customerid = $_POST['id'];
            $result = $customerBO->deleteCustomer($customerid);
            if ($result){
                echo "Delete Customer";
            }else{
                echo "not Delete";
            };
            break;
        case "getAll":
            $xx= json_encode($customerBO->getAllCustomer());
            echo $xx;
            break;
        default:
            null;
    }



