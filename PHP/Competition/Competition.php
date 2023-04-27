<?php

class Competition
{
  private $name;
  private $description;
  private $city;
  private $format;
  private $cash_prize;
  private $id;

  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    return $this->id = $id;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setName($name)
  {
    return $this->name = $name;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDescription($description)
  {
    return $this->description = $description;
  }
  public function getCity()
  {
    return $this->city;
  }
  public function setCity($city)
  {
    return $this->city = $city;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setFormat($format)
  {
    return $this->format = $format;
  }
  public function getCashPrize()
  {
    return $this->cash_prize;
  }
  public function setCashPrize($cash_prize)
  {
    return $this->cash_prize = $cash_prize;
  }

}

?>