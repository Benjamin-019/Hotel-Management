<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Réservation de Chambres</title>
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
                    <li class="current"><a href="reserve.php">Réservation</a></li>
                    <li><a href="allrooms.php">Retour</a> </li>
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
                <h1 class="page-title">Bienvenue chez nous</h1>

                <div class="dark">
                    <h3>Réservation</h3>

                    <form name="form" method="post" action="">
                        <p><input type="text" name="Email" placeholder="Email" required /></p>
                        <p><input type="text" name="Creditcard" placeholder="Numéro de carte de crédit" required /></p>
                        <p>Chambre <input type="text" name="RoomSL" placeholder="ID de la chambre souhaitée" value=<?php echo $_GET["id"]?> required readonly /></p>
                        <p>Date Arrivée <input type="date" name="datein" placeholder="Date" required /></p>
                        <p>Date Départ <input type="date" name="dateout" placeholder="Date" required /></p>

                        <div>
                            <h5> </h5>
                        </div>
                        <div>
                            <button class="button_1" type="submit" value="submit" name="submit">Réserver</button>
                            <br></br>
                            <div>
                                <?php 
								include 'dbconnect.php';
								$conn = OpenCon();

								if (isset($_POST["submit"]))
								{
									$Email = $_REQUEST['Email'];
									$Creditcard =$_REQUEST['Creditcard'];
									$RoomSL =$_REQUEST['RoomSL'];
									$datein =$_REQUEST['datein'];
									$dateout =$_REQUEST['dateout'];
									$price=0;
									if($RoomSL<=199){
										$price=150;
									}
									else if($RoomSL<=299){
										$price=100;
									}
									else{
										$price=50;
									}
									
									
									$today = date('Y-m-d');									
									$result = 0;	
									if ($dateout > $today && $datein > $today && $dateout > $datein)	{
										//Tout est ok
										$result = 1;
									}else if($dateout > $today && $datein > $today && $dateout < $datein){
										//La date de départ est supérieur à aujourd'hui (ok) ET la date d'arrivée supérieur à aujourd'hui (ok) ET la date de départ est inférieur à la date d'arrivée (ko)
										echo ('La date de départ est avant la date d\'arrivée');
										$result = 0;
									}else if($dateout < $today && $datein > $today && $dateout > $datein){
										//La date de départ est inférieur à aujourd'hui (ko) ET la date d'arrivée supérieur à aujourd'hui (ok) ET la date de départ est supérieur à la date d'arrivée (ok)
										echo('<p>La date de départ est dépassée</p>');
										$result=0;
									}else if($dateout < $today && $datein > $today && $dateout < $datein){
										//La date de départ est inférieur à aujourd'hui (ko) ET la date d'arrivée supérieur à aujourd'hui (ok) ET la date de départ est inférieur à la date d'arrivée (ko)
										echo ('La date de départ est dépassée. <br> </br> La date de départ est avant la date d\'arrivée');
										$result = 0;
									}else if($dateout < $today && $datein < $today && $dateout < $datein){
										//La date de départ est inférieur à aujourd'hui (ko) ET la date d'arrivée inférieur à aujourd'hui (ko) ET la date de départ est inférieur à la date d'arrivée (ko)
										echo ('La date de départ est dépassée. <br> </br> La date d\'arrivée est dépassée. <br> </br> La date de départ est avant la date d\'arrivée');
										$result = 0;
									}else if($dateout < $today && $datein < $today && $dateout > $datein){
										//La date de départ est inférieur à aujourd'hui (ko) ET la date d'arrivée inférieur à aujourd'hui (ko) ET la date de départ est supérieur à la date d'arrivée (ok)
										echo ('La date de départ est dépassée. <br> </br> La date d\'arrivée est dépassée.');
										$result = 0;
									}else if($dateout > $today && $datein < $today && $dateout < $datein){
										//La date de départ est supérieur à aujourd'hui (ok) ET la date d'arrivée inférieur à aujourd'hui (ko) ET la date de départ est inférieur à la date d'arrivée (ko)
										echo ('La date d\'arrivée est dépassée. <br> </br> La date de départ est avant la date d\'arrivée');
										$result = 0;
									}else if($dateout > $today && $datein < $today && $dateout > $datein){
										//La date de départ est supérieur à aujourd'hui (ok) ET la date d'arrivée inférieur à aujourd'hui (ko) ET la date de départ est supérieur à la date d'arrivée (ok)
										echo ('La date d\'arrivée est dépassée.');
										$result = 0;
									}
									
									//Si tout les tests sont ok, on peut faire l'ajout
									if($result == 1){
										$select = mysqli_query($conn,"select count(*) as reservation from customer where reservedroomsl=".$RoomSL." and datein='".$datein."'");
										$data=mysqli_fetch_assoc($select);
										if($data['reservation']!=1){
											$update="update customer set creditcard='".$Creditcard."', reservedroomsl='".$RoomSL."',datein='".$datein."',dateout='".$dateout."',price='".$price."' where email='".$Email."'";
											mysqli_query($conn, $update) or die(mysqli_error());
											echo "Réservation acceptée <br></br> </a>";
										}else{
											echo "Désolé, la chambre est déjà réservée <br></br>Veuillez choisir une autre chambre <br></br></a>";
										}
									}									
								}

								CloseCon($conn);
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
