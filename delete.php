<?php

include 'dbconnect.php';
	$conn = OpenCon();
$Serial_Number=$_REQUEST['Serial_Number'];
$query = "DELETE FROM rooms WHERE Serial_Number=$Serial_Number"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());

CloseCon($conn);
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
                <h1><span class="highlight">Pratoverde</span> Hôtels </h1>
            </div>
            <nav>
                <ul>
                    <li><a href="vrooms.php">Retour</a> </li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="newsletter">
        <div class="container">
            </form>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <article id="main-col">

                <?php
$status = "Chambre supprimée avec succès </br></br><a </a>";
echo '<h3 style="color:#FF0000;">'.$status.'</h3>';

?>

                <div>
                    <h5> </h5>
                </div>

        </div>
    </section>

    <footer>
        <p>Créé par Benjamin & Simon</p>
    </footer>
</body>

</html>
