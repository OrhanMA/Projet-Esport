<?php

class Sponsor
{
  private $brand;
  // private $team_id;
  private $id;
  private $team_id;

  public function getID()
  {
    return $this->id;
  }
  public function setID($id)
  {
    return $this->id = $id;
  }

  public function getTeamID()
  {
    return $this->team_id;
  }
  public function setTeamID($team_id)
  {
    return $this->team_id = $team_id;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  public function setBrand($brand)
  {
    return $this->brand = $brand;
  }
}

?>