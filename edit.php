<?php
 
include 'dbconnect.php';
	$conn = OpenCon();
	
$Serial_Number=$_REQUEST['Serial_Number'];
$query = "SELECT * from rooms where Serial_Number='".$Serial_Number."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Mise à jour</title>
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
                    <li class="current"><a href="vrooms.php">Retour</a> </li>
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
                <h1 class="page-title"></h1>


                <div class="dark">
                    <h3>Mise à jour</h3>

                    <form name="form" method="post" action="">
                        ID<p><input type="text" name="ID" placeholder="ID" required value="<?php echo $row['id'];?>" /></p>
                        Lieu<p><input type="text" name="Location" placeholder="Lieu" required value="<?php echo $row['location'];?>" /></p>
                        Type<p><input type="text" name="Type" placeholder="Type" required value="<?php echo $row['type'];?>" /></p>
                        Prix<p><input type="text" name="Price" placeholder="Prix" required value="<?php echo $row['price'];?>" /></p>

                        <div>
                            <h5> </h5>
                        </div>
                        <button class="button_1" type="submit" value="submit" name="submit">Envoyer</button>

                        <br></br>
                        <div>
                            <?php
if (isset($_POST["submit"]))
{
	$Serial_Number = $_REQUEST['Serial_Number'];
$ID =$_REQUEST['ID'];
$Location =$_REQUEST['Location'];
$Type = $_REQUEST['Type'];
$Price = $_REQUEST['Price'];

$update="update rooms set id='".$ID."', type='".$Type."',  price='".$Price."' where Serial_Number='".$Serial_Number."'";
mysqli_query($conn, $update) or die(mysqli_error());
    echo "Mise à jour effectuée avec succès <br></br> <a style='color:#FF0000;' href='vrooms.php'>Voir la mise à jour</a>";
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
