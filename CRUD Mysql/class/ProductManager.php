<?php


class ProductManager
{
    protected $productDB;

    public function __construct()
    {
        $dbname = "mysql:host=localhost;dbname=Product;charset=utf8";
        $username = "root";
        $password = "password";
        $db = new DBconnect($dbname, $username, $password);
        $this->productDB = new ProductDB($db->connect());
    }

    public function getList()
    {
        return $this->productDB->getList();
    }

    public function add($product)
    {
        $this->productDB->create($product);
    }
//
    public function delete($id)
    {
        $this->productDB->delete($id);
    }

    public function edit($id, $name, $type, $price, $quanlity, $date, $description)
    {
        $this->productDB->edit($id, $name, $type, $price, $quanlity, $date, $description);
    }

    public function getProductID($id)
    {
      return $this->productDB->getValueID($id);
    }
}