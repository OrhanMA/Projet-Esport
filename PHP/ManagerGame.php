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

  public function create($game)
  {
    $request = 'INSERT INTO game (name, station, format) VALUE (?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);


    $query->execute([
      $game->getName(), $game->getStation(), $game->getFormat()
    ]);
    header('Refresh:0');
  }


}

?>