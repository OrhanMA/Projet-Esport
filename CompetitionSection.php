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
// require './PHP/ManagerTeam.php';
// require './PHP/ManagerPlayer.php';
// require './PHP/ManagerSponsor.php';
require './PHP/ManagerCompetition.php';

// $managerGame = new ManagerGame();
// $allGames = $managerGame->getAll();

// $managerTeam = new ManagerTeam();
// $allTeams = $managerTeam->getAll();

// $managerSponsor = new ManagerSponsor();
// $allSponsors = $managerSponsor->getAll();

$managerCompetition = new ManagerCompetition();
$allCompetitions = $managerCompetition->getAll();

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
                    <th>Description</th>
                    <th>City</th>
                    <th>Format</th>
                    <th>Cash prize</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allCompetitions as $competition) {
                    echo ('<tr>');
                    echo ('<td>' . $competition->getName() . '</td>');
                    echo ('<td>' . $competition->getDescription() . '</td>');
                    echo ('<td>' . $competition->getCity() . '</td>');
                    echo ('<td>' . $competition->getFormat() . '</td>');
                    echo ('<td>' . $competition->getCashPrize() . '</td>');
                    echo ('</tr>');
                }
                ?>

            </tbody>
        </table>
        <form action="./CompetitionSection.php" method="POST">
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description">
            </div>
            <div>
                <label for="city">City:</label>
                <input type="text" name="city" id="city">
            </div>
            <div>
                <label for="cash_prize">Cash Prize:</label>
                <input type="text" name="cash_prize" id="cash_prize">
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
        if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['city']) && !empty($_POST['format']) && !empty($_POST['cash_prize'])) {
            var_dump('inside');
            $newCompetition = new Competition();
            $newCompetition->setName($_POST['name']);
            $newCompetition->setDescription($_POST['description']);
            $newCompetition->setCity($_POST['city']);
            $newCompetition->setFormat($_POST['format']);
            $newCompetition->setCashPrize($_POST['cash_prize']);
            $managerCompetition->create($newCompetition);
        }
        ?>
    </div>

</body>

</html>