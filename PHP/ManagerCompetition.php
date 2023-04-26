<?php

// require 'DBManager.php';
require 'Competition.php';

class ManagerCompetition extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM competition');

    $competitionList = [];

    foreach ($res as $competition) {
      $newCompetition = new Competition();
      $newCompetition->setName($competition['name']);
      $newCompetition->setDescription($competition['description']);
      $newCompetition->setCity($competition['city']);
      $newCompetition->setFormat($competition['format']);
      $newCompetition->setCashPrize($competition['cash_prize']);
      $competitionList[] = $newCompetition;
    }
    return $competitionList;
  }
}

?>