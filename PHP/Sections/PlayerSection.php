<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projet Esport</title>
  <link rel="stylesheet" href="../../style.css">
  <script src="script.js"></script>
</head>


<?php

require '../Player/ManagerPlayer.php';
$managerPlayer = new ManagerPlayer();
$allPlayers = $managerPlayer->getAll();
if (isset($_GET['delete'])) {
  // var_dump(intval($_GET['delete']));
  $managerPlayer->delete(intval($_GET['delete']));
}

?>

<body>
  <nav>
    <div>
      <a href="./PlayerSection.php">Players</a>
      <a href="./TeamSection.php">Teams</a>
      <a href="../../index.php">Games</a>
      <a href="./CompetitionSection.php">Competitions</a>
      <a href="./SponsorsSection.php">Sponsors</a>
    </div>
  </nav>
  <div class="manager">

    <table class="table">
      <thead id="top-tr">
        <tr>
          <th>ID</th>
          <th>First name</th>
          <th>Second name</th>
          <th>City</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($allPlayers as $player) {

          $removeUrl = '?delete=' . $player->getId();
          $removeLink = '<a href="' . $removeUrl . '">Delete</a>';

          // $editUrl = './playerEdit.php?edit=' . $player->getId();
          // $editLink = '<a href="' . $editUrl . '">' . 'Edit' . '</a>';
          echo ('<tr>');
          echo ('<td>' . $player->getId() . '</td>');
          echo ('<td>' . $player->getFirstName() . '</td>');
          echo ('<td>' . $player->getSecondName() . '</td>');
          echo ('<td>' . $player->getCity() . '</td>');
          echo ('<td>' . $removeLink . '</td>');
          echo ('</tr>');
        }
        ?>

      </tbody>
    </table>
    <form action="./PlayerSection.php" method="POST">
      <div>
        <label for="first_name">First name:</label>
        <input type="text" name="first_name" id="first_name">
      </div>
      <div>
        <label for="second_name">Second name:</label>
        <input type="text" name="second_name" id="second_name">
      </div>
      <div>
        <label for="city">City:</label>
        <input type="text" name="city" id="city">
      </div>
      <input type="submit" value="ADD">
    </form>
    <?php

    if (!empty($_POST['first_name']) && !empty($_POST['second_name']) && !empty($_POST['city'])) {
      $newPlayer = new Player();
      $newPlayer->setFirstName($_POST['first_name']);
      $newPlayer->setSecondName($_POST['second_name']);
      $newPlayer->setCity($_POST['city']);
      $managerPlayer->create($newPlayer);
    }
    ?>
  </div>

</body>

</html>