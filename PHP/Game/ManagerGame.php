<?php
//comment
require './PHP/DBManager.php';
require 'Game.php';

class ManagerGame extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM game');

    $gameList = [];

    foreach ($res as $game) {
      $newGame = new Game();
      $newGame->setID($game['id']);
      $newGame->setName($game['name']);
      $newGame->setStation($game['station']);
      $newGame->setFormat($game['format']);
      $gameList[] = $newGame;
    }
    return $gameList;
  }
  public function create($game)
  {
    $request = 'INSERT INTO game (id, name, station, format) VALUE (?, ?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);


    $query->execute([
      $game->getID(),
      $game->getName(), $game->getStation(), $game->getFormat()
    ]);
    header('Refresh:0');
  }

  public function delete($gameId)
  { {
      $request = 'DELETE FROM game WHERE id = ' . $gameId;
      $query = $this->getConnexion()->prepare($request);
      $query->execute();
      header('Location:index.php');
      exit();
    }
  }

  public function edit($gameID, $newGameName, $newGameStation, $newGameFormat)
  {
    $request = 'UPDATE `game` SET `name` = ? , `station` = ?, `format` = ? WHERE id = ' . $gameID;
    $query = $this->getConnexion()->prepare($request);
    $query->execute([$newGameName, $newGameStation, $newGameFormat]);
    header('Location:index.php');
    exit();
  }
}

?>