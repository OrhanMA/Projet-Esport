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

// require './PHP/ManagerGame.php';
require './PHP/ManagerTeam.php';
// require './PHP/ManagerPlayer.php';
// require './PHP/ManagerSponsor.php';
// require './PHP/ManagerCompetition.php';

// $managerGame = new ManagerGame();
// $allGames = $managerGame->getAll();

$managerTeam = new ManagerTeam();
$allTeams = $managerTeam->getAll();

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
            <a href="./PlayerSection.php">Player</a>
            <a href="./TeamSection.php">Team</a>
            <a href="./index.php">Game</a>
            <a href="./CompetitionSection.php">Competition</a>
        </div>
    </nav>
    <div class="manager">

        <table class="table">
            <thead id="top-tr">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allTeams as $team) {
                    echo ('<tr>');
                    echo ('<td>' . $team->getName() . '</td>');
                    echo ('<td>' . $team->getDescription() . '</td>');
                    echo ('</tr>');
                }
                ?>

            </tbody>
        </table>
        <form action="./TeamSection.php" method="POST">
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="description">description:</label>
                <input type="text" name="description" id="description">
            </div>
            <input type="submit" value="ADD">
        </form>
        <?php
        if (!empty($_POST['name']) && !empty($_POST['description'])) {
            $newTeam = new Team();
            $newTeam->setName($_POST['name']);
            $newTeam->setDescription($_POST['description']);
            $managerTeam->create($newTeam);
        }
        ?>
    </div>

</body>

</html>