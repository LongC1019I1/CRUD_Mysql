<?php


class ProductDB
{
    protected $conn;

    public function __construct($connect)
    {
        $this->conn = $connect;
    }

    public function getList()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchALL();
        $arr = [];
        foreach ($result as $item) {
            $product = new Product($item['id'], $item['name'], $item['type'], $item['price'],
                $item['quanlity'], $item['date'], $item['description']);
            array_push($arr, $product);
        }
        return $arr;
    }

    public function create($product)
    {
        $id = $this->conn->lastInsertID();
        $name = $product->getName();
        $type = $product->getType();
        $price = $product->getPrice();
        $quanlity = $product->getQuanlity();
        $date = $product->getDate();
        $description = $product->getDescription();
        $sql = "INSERT INTO products (id, name, type, price, quanlity, date, description) 
                VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $type);
        $stmt->bindParam(4, $price);
        $stmt->bindParam(5, $quanlity);
        $stmt->bindParam(6, $date);
        $stmt->bindParam(7, $description);
        $stmt->execute();
    }
//
    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function edit ($id, $name, $type, $price, $quanlity, $date, $description)
    {


        $sql = "
                UPDATE products
                SET name = '$name', type= '$type', price = $price, date = '$date', description='$description'
                WHERE id = $id;
";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        header("location: ../../index.php");
    }

    public function getValueID($id)
    {
        $sql = "SELECT * FROM products WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        var_dump($result);
        return new Product($id, $result[0]['name'], $result[0]['type'], $result[0]['price'], $result[0]['quanlity'], $result[0]['date'],$result[0]['description'] );
    }

}