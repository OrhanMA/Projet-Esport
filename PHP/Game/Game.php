<?php

class Game
{
  //comment 
  private $name;
  private $station;
  private $format;
  private $id;
  public function getID()
  {
    return $this->id;
  }
  public function setID($id)
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
  public function getStation()
  {
    return $this->station;
  }
  public function setStation($station)
  {
    return $this->station = $station;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setFormat($format)
  {
    return $this->format = $format;
  }
}

?>