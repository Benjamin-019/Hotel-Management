<?php
 
include 'dbconnect.php';
	$conn = OpenCon();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Planning</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">Pratoverde</span> Hôtels</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="search.php">Recherche</a></li>
                    <li><a href="vrooms.php">Retour</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="newsletter">
        <div class="container">
            <div class="container">
            </div>
        </div>

        <div class="dark">
            <div class="form">
                <h5></h5>
                <h2>Planning Réservations</h2>
                <table width="100%" border="1" style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th><strong>Date Arrivée</strong></th>
                            <th><strong>Date Départ</strong></th>
                            <th><strong>Nombre Nuits</strong></th>
                            <th><strong>Client</strong></th>
                            <th><strong>ID Chambre</strong></th>
                            <th><strong>Lieu</strong></th>
                            <th><strong>Type</strong></th>
                        </tr>
                    </thead>
            </div>
        </div>

        <?php
$count=1;
$sel_query="SELECT *,  DATEDIFF(dateout,  datein) AS date_diff FROM rooms, customer WHERE customer.reservedroomsl=rooms.id ORDER BY Datein;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
$row["dateout"] = date_create($row["dateout"]);
$row["datein"] = date_create($row["datein"]);
?>

        <tr>
            <td align="center"><?php echo date_format($row["datein"], 'd/m/Y'); ?></td>
            <td align="center"><?php echo date_format($row["dateout"], 'd/m/Y'); ?></td>
            <td align="center"><?php echo $row["date_diff"];?></td>
            <td align="center"><?php echo $row["name"]; ?></td>
            <td align="center"><?php echo $row["id"]; ?></td>
            <td align="center"><?php echo $row["location"]; ?></td>
            <td align="center"><?php echo $row["type"]; ?></td>
            <?php $count++; } ?>
            </table>
    </section>

    <footer>
        <p>Créé par Benjamin & Simon</p>
    </footer>
</body>

</html>
