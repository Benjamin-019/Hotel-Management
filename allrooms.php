<?php
include 'dbconnect.php';
$conn = OpenCon();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Inscription</title>
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
                    <li><a href="login.php">Retour</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="newsletter">
        <div class="container">
        </div>
    </section>

    <section id="main">
        <div class="container">
            <article id="main-col">
                <h1 class="page-title">Réservation Chambres</h1>

                <div class="dark">
                    <h3>Veuillez vérifier les disponibilités avant de reserver</h3>
                    <table width="100%" border="1" style="border-collapse:collapse;">
                        <thead>
                            <tr>
                                <th><strong>Numéro de chambre</strong></th>
                                <th><strong>Lieu</strong></th>
                                <th><strong>Type de chambre</strong></th>
                                <th><strong>Prix de la nuit</strong></th>
                                <th><strong>Disponibilités</strong></th>
                                <th><strong>Réservation</strong></th>

                            </tr>
                        </thead>
                </div>
        </div>

        <?php
$count = 1;
$sel_query = "Select * from rooms ORDER BY ID;";
$result = mysqli_query($conn, $sel_query);
while ($row = mysqli_fetch_assoc($result))
{ ?>
        <tr>
            <td align="center"><?php echo $row["id"]; ?></td>
            <td align="center"><?php echo $row["location"]; ?></td>
            <td align="center"><?php echo $row["type"]; ?></td>
            <td align="center"><?php echo $row["price"]; ?> euros</td>
            <td align="center"><?php echo '<a href="calendar.php?id='.$row['id'].'"<span style="color: white">Calendrier</a>';?></td>
            <td align="center"><?php echo '<a href="reserve.php?id='.$row['id'].'"<span style="color: #ff0000">Réserver</a>';?></td>
        </tr>
        <?php $count++;
} ?>
        </table>
    </section>
    <footer>
        <p>Créé par Benjamin & Simon</p>
    </footer>
</body>

</html>
