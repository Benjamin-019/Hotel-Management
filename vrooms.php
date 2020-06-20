<?php
include 'dbconnect.php';
$conn = OpenCon();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Administrateur</title>
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
                    <li><a href="insert.php">Nouvelle chambre</a></li>
                    <li><a href="planning.php">Réservations</a></li>
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
                <h2>Chambres</h2>
                <table width="100%" border="1" style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th><strong>ID</strong></th>
                            <th><strong>Lieu</strong></th>
                            <th><strong>Type</strong></th>
                            <th><strong>Prix</strong></th>
                            <th><strong>Editer</strong></th>
                            <th><strong>Supprimer</strong></th>
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
            <td align="center"><?php echo $row["price"]; ?></td>
            <td align="center"><a href="edit.php?Serial_Number=<?php echo $row["Serial_Number"]; ?>">Editer</a></td>
            <td align="center"><a href="delete.php?Serial_Number=<?php echo $row["Serial_Number"]; ?>">Supprimer</a></td>
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
