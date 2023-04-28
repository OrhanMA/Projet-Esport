<?php

require_once '../DBManager.php';
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

  public function delete($sponsorID)
  {
    $request = 'DELETE FROM sponsor WHERE id = ' . $sponsorID;
    $query = $this->getConnexion()->prepare($request);
    $query->execute();
    header('Location:SponsorsSection.php');
    exit();
  }

  public function edit($sponsorID, $newBrand, $teamID)
  {
    // $request = 'UPDATE `sponsor` SET `brand` = ' . $newBrand . ', `team_id` = ' . $teamID . ' WHERE id = ' . $sponsorID . '';
    $request = 'UPDATE `sponsor` SET `brand` = ? , `team_id` = ? WHERE id = ' . $sponsorID;
    $query = $this->getConnexion()->prepare($request);
    $query->execute([$newBrand, $teamID]);
    // var_dump($query);
    header('Location:SponsorsSection.php');
    exit();
  }
}

?>