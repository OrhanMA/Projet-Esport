<?php

require '../DBManager.php';
require 'Team.php';


class ManagerTeam extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM team');

    $teamList = [];

    foreach ($res as $team) {
      $newTeam = new Team();
      $newTeam->setName($team['name']);
      $newTeam->setDescription($team['description']);
      $teamList[] = $newTeam;
    }
    return $teamList;
  }
  public function create($team)
  {
    $request = 'INSERT INTO team (name, description) VALUE (?, ?)';
    $query = $this->getConnexion()->prepare($request);


    $query->execute([
      $team->getName(), $team->getDescription()
    ]);
    header('Refresh:0');
  }
}

?>