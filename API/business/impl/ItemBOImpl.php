<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/14/2019
 * Time: 12:15 PM
 */

require_once __DIR__ . '/../../core/Item.php';
require_once __DIR__ . '/../../db/DBConnection.php';
require_once __DIR__ . '/../../business/ItemBO.php';
require_once __DIR__ . '/../../repository/impl/ItemRepositoryImpl.php';


class ItemBOImpl implements ItemBO
{


    /**
     * ItemBOImpl constructor.
     */
    private $itemRepository;

    public function __construct()
    {
        $this->itemRepository=new ItemRepositoryImpl();
    }

    public function addItem(Item $item): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->addItem($item);
    }

    public function updateItem(Item $item): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->updateItem($item);
    }

    public function deleteItem($id): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->deleteItem($id);
    }

    public function searchItem($id): Item
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->searchItem($id);    }

    public function getAllItem(): Array
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->getAllItem();
    }
}