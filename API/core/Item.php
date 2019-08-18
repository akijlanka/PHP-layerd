<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/14/2019
 * Time: 12:16 PM
 */

class Item
{
    private $code;
    private $item_name;
    private $qty;
    private $price;

    /**
     * Item constructor.
     * @param $code
     * @param $item_name
     * @param $qty
     * @param $price
     */
    public function __construct($code, $item_name, $qty, $price)
    {
        $this->code = $code;
        $this->item_name = $item_name;
        $this->qty = $qty;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getItemName()
    {
        return $this->item_name;
    }

    /**
     * @param mixed $item_name
     */
    public function setItemName($item_name)
    {
        $this->item_name = $item_name;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



}