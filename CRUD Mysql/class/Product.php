<?php


class Product
{
    protected $id;
    protected $name;
    protected $type;
    protected $price;
    protected $quanlity;
    protected $date;
    protected $description;

    public function __construct($id, $name, $type, $price, $quanlity,$date,$description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->quanlity = $quanlity;
        $this->date = $date;
        $this->description = $description;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getQuanlity()
    {
        return $this->quanlity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }





  }