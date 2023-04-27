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

require '../Team/ManagerTeam.php';

$managerTeam = new ManagerTeam();
$allTeams = $managerTeam->getAll();

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