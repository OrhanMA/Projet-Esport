<?php

require 'DBManager.php';
require 'Game.php';

class ManagerGame extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM game');

    $gameList = [];

    foreach ($res as $game) {
      $newGame = new Game();
      $newGame->setName($game['name']);
      $newGame->setStation($game['station']);
      $newGame->setFormat($game['format']);
      $gameList[] = $newGame;
    }
    return $gameList;
  }
}

?>