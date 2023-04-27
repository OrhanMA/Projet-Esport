<?php

class Team
{
  private $name;
  private $description;
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
  public function getDescription()
  {
    return $this->description;
  }
  public function setDescription($description)
  {
    return $this->description = $description;
  }

}

?>