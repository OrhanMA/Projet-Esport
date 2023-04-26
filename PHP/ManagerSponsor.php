<?php

// require 'DBManager.php';
require 'Sponsor.php';

class ManagerSponsor extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM sponsor');

    $sponsorList = [];

    foreach ($res as $sponsor) {
      $newSponsor = new Sponsor();
      $newSponsor->setBrand($sponsor['brand']);
      $newSponsor->setTeamID($sponsor['team_id']);
      $sponsorList[] = $newSponsor;
    }
    return $sponsorList;
  }
}

?>