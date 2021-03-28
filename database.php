<!DOCTYPE html>
<html>
<head>
   <title>Database</title>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
	.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>

   <body>
<?php
#echo "test0";
if(isset($_POST["Submit"]))
{
#echo"test1";
$email = $_POST["email"];
$pswd = $_POST["psw"];

$con = mysqli_connect('localhost', 'root', '');
#echo "test2";
if(!$con)
{
    die('Connection Failed'.mysqli_error());
}
# "test3";
mysqli_select_db($con,"interview");
$query = "Select * from customer WHERE User_id='$email'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$row = $result->fetch_assoc();
$count = mysqli_num_rows($result);
if ($count<=0)
{
echo '<h2><center>Sorry, you have not registered.<br>To Register <a href="signup.html">Click Here</a></center></h2>';
}
else if(($row["User_id"] == $email) and ($row["Password"] == $pswd)){
  session_start();
  $_SESSION["id"] = $row["User_id"];
  $_SESSION["name"] = $row["Name"];
  $_SESSION["valid"] = true;  
  echo '<div><h1 style="font-family:sans-serif;color:coral"><center><br><br><br>Login Successful<br>Welcome '.$_SESSION["name"].'!<br>Go to <br><br><a style="color:white" href="index.html"><button class="button" ><span>
<i class="fa fa-home"></i>  Home</span></button></a></center></h1></div>';
}
else {
  echo "<script>alert('username or password incorrect')</script>";
  echo "<script>location.href='signin.html'</script>";
}
}
?>
</body>
</html>
