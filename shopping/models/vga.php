<?php
require_once('product.php');

class VGA extends Product
{
  private $size;

  public function __construct($id,$name, $price, $image,$size = 'N/A')
  {
    parent::__construct($id,$name, $price, $image);
    $this->size = $size;
  }

  public function getSize()
  {
    return $this->size;
  }

  public function setSize($size)
  {
    $this->size = $size;
  }
}