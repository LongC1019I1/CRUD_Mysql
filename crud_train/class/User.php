<?php


class User
{
    protected $id;
    protected $name;
    protected $age;
    protected $address;
    protected $image;
    public function __construct($id,$name,$age,$address,$image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

}