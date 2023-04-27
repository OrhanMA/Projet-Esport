<?php

require '../DBManager.php';
require 'Competition.php';

class ManagerCompetition extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM competition');

    $competitionList = [];

    foreach ($res as $competition) {
      $newCompetition = new Competition();
      $newCompetition->setId($competition['id']);
      $newCompetition->setName($competition['name']);
      $newCompetition->setDescription($competition['description']);
      $newCompetition->setCity($competition['city']);
      $newCompetition->setFormat($competition['format']);
      $newCompetition->setCashPrize($competition['cash_prize']);
      $competitionList[] = $newCompetition;
    }
    return $competitionList;
  }
  public function create($competition)
  {
    $request = 'INSERT INTO competition (id, name, description, city, format, cash_prize ) VALUE (?, ?, ?, ?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);


    $query->execute([
      $competition->getId(),
      $competition->getName(), $competition->getDescription(), $competition->getCity(), $competition->getFormat(), $competition->getCashPrize()
    ]);
    header('Refresh:0');
  }
  public function delete($competitionId)
  {
    $request = 'DELETE FROM competition WHERE id = ' . $competitionId;
    $query = $this->getConnexion()->prepare($request);
    $query->execute();
    header('Location:CompetitionSection.php');
    exit();

  }
}


?>