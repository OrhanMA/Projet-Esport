<?php

require_once 'DBManager.php';
require 'Sponsor.php';

class ManagerSponsor extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM sponsor');

    $sponsorList = [];

    foreach ($res as $sponsor) {
      $newSponsor = new Sponsor();
      $newSponsor->setID($sponsor['id']);
      $newSponsor->setBrand($sponsor['brand']);
      $newSponsor->setTeamID($sponsor['team_id']);
      $sponsorList[] = $newSponsor;
    }
    return $sponsorList;
  }
  public function create($sponsor)
  {
    $request = 'INSERT INTO sponsor (brand, team_id) VALUE (?, ?)';
    $query = $this->getConnexion()->prepare($request);


    $query->execute([
      $sponsor->getBrand(),
      $sponsor->getTeamID()
    ]);
    header('Refresh:0');
  }
}

?>