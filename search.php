<?php
 
include 'dbconnect.php';
	$conn = OpenCon();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Recherche</title>
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
                    <li><a href="planning.php">Retour</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="newsletter">
        <div class="container">
            <div class="container">
            </div>
        </div>
    </section>

    <div class="dark">
        <div class="form">
            <h5></h5>
            <h2>Recherche Réservations</h2>
            <br></br>
            <form name="form" method="post" action="">
                <table width="100%" border="1" style="border-collapse:collapse;">
                    <thead>
                        <?php									
					// Requête SQL
					$rqSql = "SELECT name FROM customer ORDER BY name ASC";
					// Exécution de la requête
					$result = mysqli_query($conn, $rqSql)
								 or die( "Exécution requête impossible.");
					
					// Construction de la chaîne de caractères qui fait la liste

					$ld = "<SELECT NAME='lstName'>";
					$ld .= "<OPTION VALUE=0>Choisissez</OPTION>";
					// On boucle sur la table
					while ( $row = mysqli_fetch_array( $result)) {
						// $row est un tableau associatif
						// les éléments sont «indicés» par les noms des colonnes 
						$nbName = $row['name'];
						$nnName = $row["name"];
						$ld .= "<OPTION VALUE='$nbName'>$nnName</OPTION>";
						$nbName++;
					}
					$ld .= "</SELECT>";
					
					$rqSqlID = "SELECT id FROM rooms ORDER BY id ASC";
					
					// Exécution de la requête
					
					$resultID = mysqli_query($conn, $rqSqlID)
								 or die( "Exécution requête impossible.");
					mysqli_close( $conn);
					
					// Construction de la chaîne de caractères qui fait la liste

					$idRoom = "<SELECT NAME='lstRoom'>";
					$idRoom .= "<OPTION VALUE=0>Choisissez</OPTION>";
					// On boucle sur la table
					
					while ( $row = mysqli_fetch_array( $resultID)) {
						// $row est un tableau associatif
						// les éléments sont «indicés» par les noms des colonnes
						$nbId = $row['id'];
						$nameRoom = $row['id'];
						$idRoom .= "<OPTION VALUE='$nbId'>$nameRoom</OPTION>";
						$nbId++;
					}
					$idRoom .= "</SELECT>";
					?>
                        <tr>
                            <th><strong>Client<align="center"><br></br><?php print $ld ?> </strong><br></br></th>
                            <th><strong>ID Chambre<align="center"><br></br><?php print $idRoom ?></strong><br></br></th>
                        </tr>
                    </thead>
                </table>

                <button class="button_1" type="submit" value="submit" name="submit">Rechercher</button>
            </form>
            <?php 
					if (isset($_POST["submit"]))
					{
						$name = $_POST['lstName'];
						$id = $_POST['lstRoom'];
						
						if(empty($name) && empty($id)){					
							
							echo 'Sélectionnez au moins un critère';
						}else{
							$conn = OpenCon();
							if(!empty($name) && !empty($id)){ //Recherche sur les deux
								$count=1;
								$sel_query="SELECT *,  DATEDIFF(dateout,  datein) AS date_diff FROM rooms, customer WHERE customer.reservedroomsl=rooms.id AND name='".$name."' and reservedroomsl='".$id."' ORDER BY Datein;";
							}else if (!empty($name) && empty($id)) { //Recherche que sur le nom
								$count=1;
								$sel_query="SELECT *,  DATEDIFF(dateout,  datein) AS date_diff FROM rooms, customer WHERE customer.reservedroomsl=rooms.id AND name='".$name."' ORDER BY Datein;";
							}else if(empty($name) && !empty($id)){ // Recherche que sur l'id de la chambre
								$count=1;
								$sel_query="SELECT *,  DATEDIFF(dateout,  datein) AS date_diff FROM rooms, customer WHERE customer.reservedroomsl=rooms.id AND reservedroomsl='".$id."' ORDER BY Datein;";
							}
							
							$result = mysqli_query($conn,$sel_query);
							if (mysqli_num_rows($result) == 0) {
								echo '<br></br>Aucun résultat ! ';
							}else{
								?>
            <br></br>
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
                <?php
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
                </tr>
            </table>
            <?php
							}
						}						
												
					}
				?>
        </div>
    </div>


    <footer>
        <p>Créé par Benjamin & Simon</p>
    </footer>
</body>

</html>
