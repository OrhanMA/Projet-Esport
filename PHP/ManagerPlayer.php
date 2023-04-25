<?php

// require 'DBManager.php';
require 'Player.php';

class ManagerPlayer extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM player');

    $playerList = [];

    foreach ($res as $player) {
      $newPlayer = new Player();
      $newPlayer->setFirstName($player['first_name']);
      $newPlayer->setSecondName($player['second_name']);
      $newPlayer->setCity($player['city']);
      $playerList[] = $newPlayer;
    }
    return $playerList;
  }
}

?>