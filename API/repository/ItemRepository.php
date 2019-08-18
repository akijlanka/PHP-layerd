<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/21/2019
 * Time: 5:57 PM
 */

require_once __DIR__.'/../core/Item.php';


interface ItemRepository
{
    public function addItem(Item $item):bool;
    public function updateItem(Item $item):bool;
    public function deleteItem($id):bool;
    public function searchItem($id):Item;
    public function getAllItem():Array;
    public function setConnection(mysqli $connection);
}