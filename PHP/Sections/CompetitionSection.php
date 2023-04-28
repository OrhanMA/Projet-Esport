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

require_once '../Competition/ManagerCompetition.php';

$managerCompetition = new ManagerCompetition();
$allCompetitions = $managerCompetition->getAll();

if (isset($_GET['delete'])) {
    // var_dump(intval($_GET['delete']));
    $managerCompetition->delete(intval($_GET['delete']));
}

if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['city']) && !empty($_POST['format']) && !empty($_POST['cash_prize'])) {
    $newCompetition = new Competition();
    $newCompetition->setName($_POST['name']);
    $newCompetition->setDescription($_POST['description']);
    $newCompetition->setCity($_POST['city']);
    $newCompetition->setFormat($_POST['format']);
    $newCompetition->setCashPrize($_POST['cash_prize']);
    $managerCompetition->create($newCompetition);
}
if (!empty($_POST['newname'])) {
    $managerCompetition->edit(intval($_POST['newid']), $_POST['newname'], $_POST['newdescription'], $_POST['newcity'], $_POST['newformat'], intval($_POST['newcashprize']));
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>City</th>
                    <th>Format</th>
                    <th>Cash prize</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allCompetitions as $competition) {
                    $removeUrl = '?delete=' . $competition->getId();
                    $removeLink = '<a href="' . $removeUrl . '">Delete</a>';

                    echo ('<tr>');
                    echo ('<td>' . $competition->getId() . '</td>');
                    echo ('<td>' . $competition->getName() . '</td>');
                    echo ('<td>' . $competition->getDescription() . '</td>');
                    echo ('<td>' . $competition->getCity() . '</td>');
                    echo ('<td>' . $competition->getFormat() . '</td>');
                    echo ('<td>' . $competition->getCashPrize() . '</td>');
                    echo ('<td>' . $removeLink . '</td>');
                    echo ('</tr>');
                }
                ?>
            </tbody>
        </table>
        <div>

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
            <form action="CompetitionSection.php" method="POST">
                <div>
                    <label for="newid">Edit:</label>
                    <select name="newid" id="newid">
                        <?php
                        foreach ($allCompetitions as $competition) {
                            echo ('<option value="' . $competition->getID() . '">' . $competition->getName() . '</option>');
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
                <div>
                    <label for="newcity">new City:</label>
                    <input type="text" name="newcity" id="newcity">
                </div>
                <div>
                    <label for="newcashprize">new Cash prize:</label>
                    <input type="number" name="newcashprize" id="newcashprize">
                </div>
                <div>
                    <label for="newformat">new Format:</label>
                    <select name="newformat" id="newformat">
                        <option value="MOBA">MOBA</option>
                        <option value="FPS">FPS</option>
                        <option value="Battle Royale">Battle Royale</option>
                        <option value="Jeu de cartes à collectionner">Jeu de cartes à collectionner</option>
                        <option value="Sport">Sport</option>
                        <option value="FPS tactique">FPS tactique</option>
                        <option value="Combat">Combat</option>
                    </select>
                </div>
                <input type="submit" value="EDIT">
            </form>
        </div>
    </div>

</body>

</html>