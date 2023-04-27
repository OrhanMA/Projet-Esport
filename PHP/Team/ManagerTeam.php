<?php

require_once '../DBManager.php';
require 'Team.php';


class ManagerTeam extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM team');

    $teamList = [];

    foreach ($res as $team) {
      $newTeam = new Team();
      $newTeam->setId($team['id']);
      $newTeam->setName($team['name']);
      $newTeam->setDescription($team['description']);
      $teamList[] = $newTeam;
    }
    return $teamList;
  }
  public function create($team)
  {
    $request = 'INSERT INTO team (id,name, description) VALUE (?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);


    $query->execute([
      $team->getId(),
      $team->getName(), $team->getDescription()
    ]);
    header('Refresh:0');
  }
  public function delete($teamId)
  {
    $request = 'DELETE FROM team WHERE id = ' . $teamId;
    $query = $this->getConnexion()->prepare($request);
    $query->execute();
    header('Location:TeamSection.php');
    exit();
  }
}



?>