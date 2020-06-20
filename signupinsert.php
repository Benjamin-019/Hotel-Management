<?php
$name=  $_POST['name'];
$address=  $_POST['address'];
$email=  $_POST['email'];
$password=  $_POST['password'];

include 'dbconnect.php';
$conn = OpenCon(); 

	
		$Select = mysqli_query($conn, "Select count(*) as mail From customer Where email ='".$email."'");
		$data=mysqli_fetch_assoc($Select);
		if($data['mail']==0){
			$Insert = "Insert into customer (name, address, email, password) values('$name', '$address', '$email', '$password')";
			if ($conn->query($Insert) === TRUE) {
				header ("location: welcome.php");
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
			header ("location: signup.php?retour=ko");
		}
		
		
		
		$conn->close();



?>
