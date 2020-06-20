<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "pratoverde hotels";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Erreur de connexion: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>
