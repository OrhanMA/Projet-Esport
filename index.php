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
// require './PHP/ManagerTeam.php';
// require './PHP/ManagerPlayer.php';
// require './PHP/ManagerSponsor.php';
// require './PHP/ManagerCompetition.php';

$managerGame = new ManagerGame();
$allGames = $managerGame->getAll();

// $managerTeam = new ManagerTeam();
// $allTeams = $managerTeam->getAll();

// $managerSponsor = new ManagerSponsor();
// $allSponsors = $managerSponsor->getAll();

// $managerCompetition = new ManagerCompetition();
// $allCompetitions = $managerCompetition->getAll();

// $managerSponsor = new ManagerSponsor();
// $allSponsors = $managerSponsor->getAll();
?>

<body>
  <nav>
    <div>
      <a href="./PlayerSection.php">Players</a>
      <a href="./TeamSection.php">Teams</a>
      <a href="./index.php">Games</a>
      <a href="./CompetitionSection.php">Competitions</a>
      <a href="./SponsorsSection.php">Sponsors</a>
    </div>
  </nav>
  <div class="manager">

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
    <form action="./index.php" method="POST">
      <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
      </div>
      <div>
        <label for="station">Station:</label>
        <select name="station" id="station">

          <option value="PC">PC</option>
          <option value="Xbox One">Xbox One</option>
          <option value="PlayStation 4">PlayStation 4 </option>
          <option value="PlayStation 5">PlayStation 5 </option>
          <option value="Xbox Series">Xbox Series </option>
          <option value="Switch">Switch </option>
        </select>
      </div>
      <div>
        <label for="format">Format:</label>
        <select name="format" id="format">
          <option value="MOBA">MOBA</option>
          <option value="FPS">FPS</option>
          <option value="Battle Royale">Battle Royale</option>
          <option value="Jeu de cartes à collectionner">Jeu de cartes à collectionner</option>
          <option value="Sport">Sport</option>
          <option value="FPS tactique">FPS tactique</option>
          <option value="Combat">Combat</option>
        </select>
      </div>
      <input type="submit" value="ADD">
    </form>
    <?php
    if (!empty($_POST['name']) && isset($_POST['station']) && isset($_POST['format'])) {
      $newGame = new Game();
      $newGame->setName($_POST['name']);
      $newGame->setStation($_POST['station']);
      $newGame->setFormat($_POST['format']);
      $managerGame->create($newGame);
    }
    ?>
  </div>

</body>

</html>