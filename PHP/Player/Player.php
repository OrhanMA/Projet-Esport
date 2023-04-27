<?php

class Player
{
  private $first_name;
  private $second_name;
  private $city;
  private $id;

  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    return $this->id = $id;
  }
  public function getFirstName()
  {
    return $this->first_name;
  }
  public function setFirstName($first_name)
  {
    return $this->first_name = $first_name;
  }
  public function getSecondName()
  {
    return $this->second_name;
  }
  public function setSecondName($second_name)
  {
    return $this->second_name = $second_name;
  }

  public function getCity()
  {
    return $this->city;
  }
  public function setCity($city)
  {
    return $this->city = $city;
  }

}

?>