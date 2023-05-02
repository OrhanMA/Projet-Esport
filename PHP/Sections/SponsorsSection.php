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
          // $removeEditLink = '<a href="' . $editUrl . '">Edit</a>';
        
          echo ('<tr>');
          echo ('<td>' . $sponsor->getID() . '</td>');
          echo ('<td>' . $sponsor->getBrand() . '</td>');
          echo ('<td>' . $sponsor->getTeamID() . '</td>');
          echo ('<td class="deleteBtn">' . $removeLink . '</td>');
          // echo ('<td>' . $editLink . '</td>');
          echo ('</tr>');
        }
        ?>

      </tbody>
    </table>
    <div class="modif">

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

      <form action="./SponsorsSection.php" method="post">
        <div>
          <label for="newid">ID</label>
          <select name="newid" id="newid">
            <?php
            foreach ($allSponsors as $sponsor) {
              echo ('<option value="' . $sponsor->getID() . '">' . $sponsor->getBrand() . '</option>');
            }
            ?>
          </select>
        </div>
        <div>
          <label for="newbrand">New brand</label>
          <input type="text" name="newbrand" id="newbrand">
        </div>
        <div>
          <label for="newteam">Team</label>
          <select name="newteam" id="newteam">
            <?php
            foreach ($allTeams as $team) {
              echo ('<option value="' . $team->getID() . '">' . $team->getName() . '</option>');
            }
            ?>
          </select>
        </div>
        <input type="submit" value="EDIT">
      </form>

    </div>
  </div>
  <?php
  if (!empty($_POST['brand'])) {
    $newSponsor = new Sponsor();
    $newSponsor->setBrand($_POST['brand']);
    $newSponsor->setTeamID($_POST['team']);
    $managerSponsor->create($newSponsor);
  }
  if (!empty($_POST['newbrand'])) {
    $managerSponsor->edit(intval($_POST['newid']), $_POST['newbrand'], intval($_POST['newteam']));
  }

  ?>

</body>

</html>