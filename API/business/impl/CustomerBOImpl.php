<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/11/2019
 * Time: 10:47 AM
 */

require_once __DIR__ . '/../../core/Customer.php';
require_once __DIR__ . '/../../db/DBConnection.php';
require_once __DIR__ . '/../../business/CustomerBO.php';
require_once __DIR__ . '/../../repository/impl/CustomerRepositoryImpl.php';


class CustomerBOImpl implements CustomerBO
{
    private $customerRepository;

    /**
     * CustomerBOImpl constructor.
     */
    public function __construct()
    {
        $this->customerRepository=new CustomerRepositoryImpl();
    }

    public function addCustomer(Customer $customer): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->addCustomer($customer);
    }

    public function updateCustomer(Customer $customer): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->updateCustomer($customer);
    }

    public function deleteCustomer($id): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->deleteCustomer($id);
    }

    public function searchCustomer($id): Customer
    {
        // TODO: Implement searchCustomer() method.
    }

    public function getAllCustomer(): Array
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->getAllCustomer();
    }
}