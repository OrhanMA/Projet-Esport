<?php

class Sponsor
{
  private $brand;
  private $team_id;

  public function getBrand()
  {
    return $this->brand;
  }
  public function setBrand($brand)
  {
    return $this->brand = $brand;
  }
  public function getTeamID()
  {
    return $this->team_id;
  }
  public function setTeamID($team_id)
  {
    return $this->team_id = $team_id;
  }

}

?>