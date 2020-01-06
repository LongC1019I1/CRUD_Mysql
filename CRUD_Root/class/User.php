<?php


class User
{
    protected $id;
    protected $name;
    protected $age;
    protected $address;
    protected $avatar;

    public function __construct($id, $name, $age, $address, $avatar)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->avatar = $avatar;
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
    public function getAge()
    {
        return $this->age;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }


}