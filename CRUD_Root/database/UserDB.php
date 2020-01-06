<?php


class UserDB
{
    protected $conn;

    public function __construct($connect)
    {
        $this->conn = $connect;
    }

    public function getList()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchALL();
        $arr = [];
        foreach ($result as $item) {
            $user = new User($item['id'], $item['name'], $item['age'], $item['address'], $item['avatar']);
            array_push($arr, $user);
        }
        return $arr;
    }

    public function create($user)
    {
        $id = $this->conn->lastInsertID();
        $name = $user->getName();
        $age = $user->getAge();
        $address = $user->getAddress();
        $avatar = $user->getAvatar();
        $sql = "INSERT INTO users (id, name, age, address, avatar) VALUE (?, ?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $age);
        $stmt->bindParam(4, $address);
        $stmt->bindParam(5, $avatar);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function edit($id, $name, $age, $address, $avatar)
    {
        $sql = "UPDATE users SET name = '$name', age = $age, address = '$address', avatar = '$avatar' WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        header("location: ../../index.php");
    }

    public function getValueID($id)
    {
        $sql = "SELECT * FROM users WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return new User($id, $result[0]['name'], $result[0]['age'], $result[0]['address'], $result[0]['avatar']);
    }

}