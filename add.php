<html>
<head>
	<title>Add Data</title>


</head>


<body>


<?php
//including the database connection file
include_once("config.php");
#echo "test1";
if(isset($_POST['Submit'])) {	
	#echo "test2";d
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$pswd = mysqli_real_escape_string($mysqli, $_POST['psw']);
	$add  = mysqli_real_escape_string($mysqli, $_POST['address']);
	$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
	// checking empty fields
	if(empty($name) || empty($pswd) || empty($email) || empty($add) || empty($phone) ) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($pswd)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}

		if(empty($add)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}
		if(empty($phone)) {
			echo "<font color='red'>Phone_no field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		//	#echo "test3";
		//insert data to database	
		$result = mysqli_query($mysqli,"INSERT INTO customer(Name,User_id,Password,Address,Phone) VALUES('$name','$email','$pswd','$add','$phone')");
		//echo "test 3";
		//display success message
	}
}
?>
<div class="container signin">
    <h1 style="font-family:sans-serif; color:#0099ff;font-size:300%"><center><br><br>You have registered successfully<br><a href="signin.html"><br><button class="a" style="padding:5px; background-color: #008CBA; 
  color: white; 
  border: 2px solid #008CBA; border-radius:6px; font-size: 20px;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);transform: translateY(4px);">Sign in</button></a></center></h1>
  </div>
</body>
</html>
