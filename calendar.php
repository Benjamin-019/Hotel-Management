<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Calendrier</title>
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
                    <li class="current"><a href="allrooms.php">Retour</a> </li>
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
                <h1 class="page-title">Disponibilité de la chambre n°<?php echo $_GET["id"]?></h1>
                <h3>En rouge les jours indisponibles</h3>

                <div class="white">

                    <table width="100%" border="1" style="border-collapse:collapse;">
                        <thead>
                            <tr>

                                <?php
include 'dbconnect.php';
$conn = OpenCon();
$RoomSL =$_GET['id'];
$sel_query = "Select * from customer WHERE reservedroomsl='".$RoomSL."';";
$result = mysqli_query($conn, $sel_query);
$blocked=array();
while ($row = mysqli_fetch_assoc($result)){	
	$datein = $row['datein'];	
	$dateout = $row['dateout'];	
	
	$selected = array($datein, $dateout);	
	 
	$limite = new DateTime($datein);

	$now = new DateTime($dateout);
	 
	$allDays = array();
	$allDays[] = $limite->format('Y-m-d');
	
	while($limite < $now) {
		$limite->add(new DateInterval('P1D'));
		$allDays[] = $limite->format('Y-m-d');
	}
	
	//Si une seule nuit (pas de plage de date), ajoute la datein et la dateout
	if(empty(array_diff($allDays,$selected))){
		array_push($blocked, $datein, $dateout);
	}else{
		//Liste les jours entre deux plages de dates
		$jour = array_diff($allDays,$selected);
		array_push($jour, $datein);
		array_push($jour, $dateout);
		
		//Pour chaque date, ajoute dans le tableau d'indisponibilité
		foreach($jour as $word)
		{
			array_push($blocked, $word);	
		}
	}	
	
}
$month=date('n');
$year=date('Y');
$day=date('d');
$today = date('Y-m-d');
$display=array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');

echo '<table border=0 width=700>';
echo '<th colspan=4 align=center style="font-family:Verdana; font-size:18pt; color:#ff0000;">'.$year.'</th>';

for ($row=1; $row<=3; $row++) {
	echo '<tr>';
	for ($column=1; $column<=4; $column++) {
		$this_month=($row-1)*4+$column;
		$week_day=date('w',mktime(0,0,0,$this_month,1,$year));
		$month_day=date('t',mktime(0,0,0,$this_month,1,$year));
		if ($week_day==0) $week_day=7;
		echo '<td width="25%" valign=top>';
		echo '<table border=0 align=center style="font-size:8pt; font-family:Verdana">';
		echo '<th colspan=7 align=center style="font-size:12pt; font-family:Arial; color:#666699;">'.$display[$this_month-1].'</th>';
		echo '<tr><td style="color:#666666"><b>Lu</b></td><td style="color:#666666"><b>Ma</b></td>';
		echo '<td style="color:#666666"><b>Me</b></td><td style="color:#666666"><b>Je</b></td>';
		echo '<td style="color:#666666"><b>Ve</b></td><td style="color:#cc0000"><b>Sa</b></td>';
		echo '<td style="color:#cc0000"><b>Di</b></td></tr>';
		echo '<tr><br>';
		$i=1;
		while ($i<$week_day) {
			echo '<td> </td>';
			$i++;
		}
		$i=1;
		
		while ($i<=$month_day) {
			$currentdate = date_create($i.'-'.$this_month.'-'.$year);
			$createddate = date_format($currentdate, 'Y-m-d');
			
			$rest=($i+$week_day-1)%7;
			echo '<td style="font-size:8pt; color:white; font-family:Verdana" align=center>';
							
						
									//Current day
			if (($i==$day) && ($this_month==$month)){
				if(in_array($createddate,$blocked)){
					echo '<b><span style="color:white; background-color:red;">'.$i.'</span></b>';
				}else{
					echo '<span style="color:#000000;">'.$i.'</span>';
				}				
			}else if ($rest==6) { 	//Saturday
				if(in_array($createddate,$blocked)){
					echo '<span style="color:#000000;background-color:red;">'.$i.'</span>';
				}else{
					echo '<span style="color:#cc0000;">'.$i.'</span>';
				}
			}else if ($rest==0) { 	//Sunday
				if(in_array($createddate,$blocked)){
					echo '<span style="color:#000000;background-color:red;">'.$i.'</span>';
				}else{
					echo '<span style="color:#cc0000;">'.$i.'</span>';
				}
			}else {					//Other days
				
				if(in_array($createddate,$blocked)){
					
					echo '<span style="color:#000000;background-color:red;">'.$i.'</span>';
				}else{
					echo '<span style="color:#000000">'.$i.'</span>';
				}
			}
			echo "</td>\n";
			if ($rest==0) echo "</tr>\n<tr>\n";
			$i++;
		}
		echo '</tr>';
		echo '</table>';
		echo '</td>';
	}
	echo '</tr>';
}

echo '</table>';
?>

                            </tr>
                        </thead>
                </div>
        </div>
        </table>

    </section>

    <footer>
        <p>Créé par Benjamin & Simon</p>
    </footer>
</body>

</html>
