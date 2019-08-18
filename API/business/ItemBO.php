<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/14/2019
 * Time: 12:15 PM
 */

require_once __DIR__.'/../core/Item.php';

interface ItemBO
{
    public function addItem(Item $item):bool;
    public function updateItem(Item $item):bool;
    public function deleteItem($id):bool;
    public function searchItem($id):Item;
    public function getAllItem():Array;
}