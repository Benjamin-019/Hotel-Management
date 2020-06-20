<?php
include 'dbconnect.php';
$conn = OpenCon();

if (isset($_POST['ID']))
{
    $ID = $_REQUEST['ID'];
    $Location = $_REQUEST['Location'];
    $Type = $_REQUEST['Type'];
    $Price = $_REQUEST['Price'];

    $ins_query = "insert into rooms (id,location,type,price) values ('$ID','$Location','$Type','$Price')";
    $result = mysqli_query($conn, $ins_query);
}
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
                    <li href="current"><a href="index.php">Accueil</a></li>
                    <li class="current"><a href="vrooms.php">Retour</a></li>
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
                <h1 class="page-title">Création d'une nouvelle chambre</h1>

                <div class="dark">
                    <h1>Nouvelle Chambre</h1>
                    <form name="form" method="post" action="">
                        <p><input type="text" name="ID" placeholder="ID" required /></p>
                        <p><input type="text" name="Location" placeholder="Lieu" required /></p>
                        <p><input type="text" name="Type" placeholder="Type" required /></p>
                        <p><input type="text" name="Price" placeholder="Prix" required /></p>

                        <div>
                            <h5> </h5>
                        </div>
                        <button class="button_1" type="submit" value="submit" name="submit">Envoyer</button>
                        <br></br>
                        <div>
                            <?php
if (isset($_POST["submit"]))
{
    echo "Nouvelle chambre créée avec succès <br></br> <a style='color:#FF0000;' href='vrooms.php'>Voir la mise à jour</a>";
}
?>
                        </div>
                    </form>
                </div>
    </section>

    <footer>
        <p>Créé par Benjamin & Simon</p>
    </footer>
</body>

</html>
