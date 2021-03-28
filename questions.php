<!DOCTYPE html>
<html>
<head>
   <title>Interview Questions</title>
   <meta charset="UTF-8">
   <link href="style.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
</head>




<body>
 <div class="w3-top">
  <div class="w3-bar w3-black w3-wide w3-padding w3-card">
    <a href="index.html" class="w3-bar-item w3-button"><b>&#9650</b></a>
    <a href="companies.php" class="w3-bar-item w3-button">Companies</a>
    <a href="about.html" class="w3-bar-item w3-button">Contact Us</a>
   
    <form action="search.php" method="GET">
    <input class="w3-bar-item w3-border" size="40" type="text" placeholder="type here to search..." name="search">
    <button class="w3-button w3-bar-item" type="submit" name="submit" value="search"><i class="fa fa-search"></i></button>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      
  
     <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
      
      
    </div>
  </div>
</div>


</form>
</div>
</div>

    
    <br>
    <br>
    <br>
<?php

//including the database connection file
include_once("config.php");

//echo "test0";
if(isset($_POST["cid"]))
{
//echo"test1";
$id = $_POST["cid"];


$con = mysqli_connect('localhost', 'root', '');
//echo "test2";
if(!$con)
{
    die('Connection Failed'.mysqli_error());
}
//"test3";
mysqli_select_db($con,"interview");
$query = "SELECT * FROM q where cid = '$id'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);
if ($count<=0)
{
echo "<h1>Sorry, no questions found </h1>";

}
else {
$sldt = mysqli_query($con,$query);
echo '<center><table class="w3-table-all w3-large" style="width:70%;">  
      <tr class="w3-green">
          <th style="text-align:center"> Questions </th> 
          <th>           </th>
      </tr>';

while($row = mysqli_fetch_assoc($sldt))
{
    
    $field1name = $row["Questions"];
    echo '<tr> 
        <td ><b>'.$field1name.'</b></td> 
        
        <td><form action="index.html" method="post">
        <input type="hidden" value="'.$id.'" name = "cid">
        <input class="w3-button w3-green" type="submit" value="Attempt">
        </form></td>
        </tr>';
}
echo "</table>";
mysqli_close($con);
}
}
?>

</body>
</html>


