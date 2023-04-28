<?php

require '../DBManager.php';
require 'Player.php';

class ManagerPlayer extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM player');

    $playerList = [];

    foreach ($res as $player) {
      $newPlayer = new Player();
      $newPlayer->setId($player['id']);
      $newPlayer->setFirstName($player['first_name']);
      $newPlayer->setSecondName($player['second_name']);
      $newPlayer->setCity($player['city']);
      $playerList[] = $newPlayer;
    }
    return $playerList;
  }
  public function create($player)
  {
    $request = 'INSERT INTO player (id, first_name, second_name, city) VALUE (?, ?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);


    $query->execute([
      $player->getId(),
      $player->getFirstName(), $player->getSecondName(), $player->getCity()
    ]);
    header('Refresh:0');
  }


  public function delete($playerId)
  {

    $request = 'DELETE FROM player WHERE id = ' . $playerId;
    $query = $this->getConnexion()->prepare($request);
    $query->execute();
    header('Location:PlayerSection.php');
    exit();

  }

  public function edit($playerID, $newFirstName, $newSecondName, $newCity)
  {
    $request = 'UPDATE `player` SET `first_name` = ? , `second_name` = ?, `city` = ? WHERE id = ' . $playerID;
    $query = $this->getConnexion()->prepare($request);
    $query->execute([$newFirstName, $newSecondName, $newCity]);
    header('Location:PlayerSection.php');
    exit();
  }
}

?>