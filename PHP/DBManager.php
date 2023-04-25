<?php

class DBManager
{
  private $bdd;
  // variable qui store la bdd

  public function __construct()
  {
    try {
      $this->bdd = new PDO(
        'mysql:host=localhost;dbname=esport;charset=utf8',
        'root',
        'root'
      );
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }

  public function getConnexion()
  {
    return $this->bdd;
  }
}

?>