<?php


class UserDB
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getList() {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];

        foreach ($result as $value ) {
            $user = New User(
                $id = $value['id'],
                $name = $value['name'],
                $age = $value['age'],
                $address = $value['address'],
                $image = $value['image']
            );
            array_push($arr, $user);
        }
        return $arr;
    }

    public function create($user){
        $id = $this->conn->lastInsertID();
        $name = $user->getName();
        $age = $user->getAge();
        $address = $user->getAddress();
        $image = $user->getImage();
        $sql = "INSERT INTO users (id,name,age,address,image) VALUE  (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$name);
        $stmt->bindParam(3,$age);
        $stmt->bindParam(4,$address);
        $stmt->bindParam(5,$image);
        $stmt->execute();
        header("location: ../../index.php");
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function edit ($id,$name,$age, $address, $image)
    {
        $sql = "UPDATE users SET name = $name , age = $age, address = $address, avatar = $image WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        header("location:../../index.php");
    }

    public function getValueID($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return new User($id, $result[0]['name'], $result[0]['age'], $result[0]['address'],$result[0]['image']);
    }


}