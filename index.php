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

$managerGame = new ManagerGame();
$allGames = $managerGame->getAll();
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
  <div class="glass">
    <?php
    // var_dump($allGames);
    ?>
    <ul>
      <?php
      foreach ($allGames as $game) {
        echo ('<li>' . $game->getName() . ' station: ' . $game->getStation() . ' format: ' . $game->getFormat() . '</li>');
      }
      ?>
    </ul>
  </div>
</body>

</html>