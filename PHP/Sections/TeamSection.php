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
if (isset($_GET['delete'])) {
    // var_dump(intval($_GET['delete']));
    $managerTeam->delete(intval($_GET['delete']));
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allTeams as $team) {

                    $removeUrl = '?delete=' . $team->getId();
                    $removeLink = '<a href="' . $removeUrl . '">Delete</a>';

                    echo ('<tr>');
                    echo ('<td>' . $team->getId() . '</td>');
                    echo ('<td>' . $team->getName() . '</td>');
                    echo ('<td>' . $team->getDescription() . '</td>');
                    echo ('<td  class="deleteBtn">' . $removeLink . '</td>');
                    echo ('</tr>');
                }
                ?>

            </tbody>
        </table>
        <div>

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
            <form action="./TeamSection.php" method="post">
                <div>
                    <label for="newid">Team to modify</label>
                    <select name="newid" id="newid">
                        <?php
                        foreach ($allTeams as $team) {
                            echo ('<option value="' . $team->getID() . '">' . $team->getName() . '</option>');
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="newname">new Name:</label>
                    <input type="text" name="newname" id="newname">
                </div>
                <div>
                    <label for="newdescription">new Description:</label>
                    <input type="text" name="newdescription" id="newdescription">
                </div>
                <input type="submit" value="EDIT">
            </form>
        </div>
        <?php
        if (!empty($_POST['name']) && !empty($_POST['description'])) {
            $newTeam = new Team();
            $newTeam->setName($_POST['name']);
            $newTeam->setDescription($_POST['description']);
            $managerTeam->create($newTeam);
        }
        if (!empty($_POST['newname'])) {
            $managerTeam->edit(intval($_POST['newid']), $_POST['newname'], $_POST['newdescription']);
        }
        ?>
    </div>

</body>

</html>