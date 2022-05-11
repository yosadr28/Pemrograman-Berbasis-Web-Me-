<?php
require_once('product.php');
class Processor extends Product
{
    private $cores;
    public function __construct($id, $name, $price, $image, $cores = 1)
    {
        parent::__construct($id, $name, $price, $image);
        $this->cores = $cores;
    }
    public function getCores()
    {
        return $this->cores;
    }
    public function setCores($cores)
    {
        $this->cores = $cores;
    }
}
