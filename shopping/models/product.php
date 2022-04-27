<?php
class Product
{
    protected $id;
    protected $name;
    protected $price;
    protected $image;
    public $teks;
    private $orderCount = 0;
    private static $count = 0;
    public function __construct($id, $name, $price, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        self::$count++;
    }
    //$this mereferensikan object dari kelas ini
    //self merenferesikan kelasnya langsung
    public static function getCount()
    {
        return self::$count;
    }

    public function hello()
    {
        echo 'Nama produk: ' . $this->name;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getOrderCount()
    {
        return $this->orderCount;
    }
    public function setOrderCount($orderCount)
    {
        $this->orderCount = $orderCount;
    }
    public function getPriceVAT()
    {
        return round($this->price * 1.11, 2);
    }
    public function getTotalPrice()
    {
        return $this->getPriceVAT() * $this->orderCount;
    }
    public function getTeks()
    {
        return $this->teks;
    }
}
