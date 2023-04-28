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

require '../Sponsor/ManagerSponsor.php';

$managerSponsor = new ManagerSponsor();
$allSponsors = $managerSponsor->getAll();


require '../Team/ManagerTeam.php';

$managerTeam = new ManagerTeam();
$allTeams = $managerTeam->getAll();

if (isset($_GET['delete'])) {
  $managerSponsor->delete(intval($_GET['delete']));
}

// if (isset($_GET['edit'])) {
//   $managerSponsor->edit(intval($_GET['delete']));
// }


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
          <th>Brand</th>
          <th>Team ID</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($allSponsors as $sponsor) {
          $removeUrl = '?delete=' . $sponsor->getID();
          $removeLink = '<a href="' . $removeUrl . '">Delete</a>';

          // $editUrl = '?edit=' . $sponsor->getID();
          // $removeLink = '<a href="' . $editUrl . '">Edit</a>';
        
          echo ('<tr>');
          echo ('<td>' . $sponsor->getID() . '</td>');
          echo ('<td>' . $sponsor->getBrand() . '</td>');
          echo ('<td>' . $sponsor->getTeamID() . '</td>');
          echo ('<td>' . $removeLink . '</td>');
          // echo ('<td>' . $editLink . '</td>');
          echo ('</tr>');
        }
        ?>

      </tbody>
    </table>
    <form action="./SponsorsSection.php" method="POST">
      <div>
        <label for="brand">Brand:</label>
        <input type="text" name="brand" id="brand">
      </div>
      <select name="team" id="team">
        <?php
        foreach ($allTeams as $team) {
          echo ('<option value="' . $team->getID() . '">' . $team->getName() . '</option>');
        }
        ?>
      </select>
      <input type="submit" value="ADD">
    </form>
  </div>
  <?php
  if (!empty($_POST['brand'])) {
    $newSponsor = new Sponsor();
    $newSponsor->setBrand($_POST['brand']);
    $newSponsor->setTeamID($_POST['team']);
    $managerSponsor->create($newSponsor);
  }
  ?>

</body>

</html>