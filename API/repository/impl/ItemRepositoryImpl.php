<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/21/2019
 * Time: 5:52 PM
 */

require_once __DIR__.'/../../core/Item.php';
require_once __DIR__.'/../../db/DBConnection.php';
require_once __DIR__.'/../ItemRepository.php';

class ItemRepositoryImpl implements ItemRepository
{

    private $connection;

    public function addItem(Item $item): bool
    {
        return($this->connection->query(
            "INSERT INTO item VALUES (
'{$item->getCode()}',
'{$item->getItemName()}',
'{$item->getQty()}',
'{$item->getPrice()}'
)"
        ));
    }

    public function updateItem(Item $item): bool
    {
        return($this->connection->query(
            "UPDATE  item  SET  
itemname='{$item->getItemName()}',
qtyOnHand='{$item->getQty()}',
unitPrice='{$item->getPrice()}', 
WHERE code='{$item->getCode()}'"));
    }

    public function deleteItem($id): bool
    {
        return($this->connection->query("DELETE FROM item WHERE code='{$id}'"));
    }

    public function searchItem($id): Item
    {
        $res=$this->connection->query("select * from item where code='$id'");
        return $res->fetch_row();    }

    public function getAllItem(): Array
    {
        $result =$this->connection->query("SELECT * FROM item");
        return $result->fetch_all();
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }
}