<?php

class Team
{
  private $name;
  private $description;

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