<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projet Esport</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>


<?php

require './PHP/ManagerGame.php';
require './PHP/ManagerTeam.php';

$managerGame = new ManagerGame();
$allGames = $managerGame->getAll();

$managerTeam = new ManagerTeam();
$allTeams = $managerTeam->getAll();
?>

<body>
  <nav>
    <div>
      <button>Players</button>
      <button>Teams</button>
      <button>Games</button>
      <button>Competitions</button>
    </div>
  </nav>
  <form action="./index.php" method="post">
    <div>

      <div>
        <label for="firstname">First name</label>
        <input type="text">
      </div>
      <div>
        <label for="secondname">Second name</label>
        <input type="text">
      </div>
      <div>
        <label for="city">City</label>
        <input type="text">
      </div>
    </div>
    <button>Add</button>
  </form>
  <table class="table">
    <thead id="top-tr">
      <tr>
        <th>Name</th>
        <th>Station</th>
        <th>Format</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($allGames as $game) {
        echo ('<tr>');
        echo ('<td>' . $game->getName() . '</td>');
        echo ('<td>' . $game->getStation() . '</td>');
        echo ('<td>' . $game->getFormat() . '</td>');
        echo ('</tr>');
      }
      ?>

    </tbody>
  </table>
</body>

</html>