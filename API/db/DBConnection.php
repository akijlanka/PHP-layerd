<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aki
 * Date: 7/10/2019
 * Time: 9:51 AM
 */
class DBConnection{

    private $host="localhost";
    private $username="root";
    private $password="1234";
    private $database="company";
    private $port="3306";
    private $connection;

    /**
     * DBConnection constructor.
     */
    public function __construct()
    {
        $this ->connection=new mysqli(
            $this->host,$this->username,$this->password,
            $this->database,$this->port
        );
        if ($this->connection->connect_error){
            echo $this->connection->connect_error;
            die();
        }
    }


    public function getConnection(){
        return $this ->connection;
    }

}