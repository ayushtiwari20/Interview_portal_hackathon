<html>
<head>
<title>Company Details</title>

<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
  .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
</style>
</head>

<style>
.float-container {
    padding-right: 40px;
    padding-left: 80px;
    
}
.float-container1 {
    padding-right: 30px;
    padding-left: 30px;
    
}

.float-child {
    width: 45%;
    height: 70%;
    float: left;
    padding: 20px;
    
}

.button-a {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 20em;  
  height: 4em;
}
</style>

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

<?php
session_start();

//connecting to database 
$username = "root"; 
$password = ""; 
$database = "interview"; 
$mysqli = new mysqli("localhost", $username, $password, $database);

//initialize global variables
$field1name = "Name";
//$field2name = 10;
//$field3name = 10;

//$id = $_POST['Product_id'];
$id = ''; 
if( isset( $_POST["cid"])) {
    $id = $_POST["cid"]; 
} 
$sql = "SELECT * FROM companies where cid = '$id'";

$cid = $id;
$directory = "./images/";
if ($result = $mysqli->query($sql)) {
    while($row = $result->fetch_assoc()){ 
        $field1name = $row["Name"];
        //$field2name = $row["Cost"];
        //$field3name = $row["Units"];
        $field2name = $row["Description"];
        //$tag1 = $row['tag1'];
        // echo "$tag1";
        //$tag2 = $row['tag2'];
        //$tag3 = $row['tag3'];
        //$tag4 = $row['tag4'];
    //$result->free();
}
}
?>

<div class="float-container">
  <div class= "float-child">
    <center><?php
      echo '<img  src = "'.$directory.$cid.'.png" class="d-block h-100" height=100 width=500>';
      ?></center>
    
  </div>
  <br>
  <br>
  <br>
  <div class= "float-child">
    
                <h2><?php echo $field1name; ?></h2>
                <?php
                 echo '<img  src = "./images/stars.png" class="d-block w-100" height = 125 width = 10>';
                 ?>
                
                <p>Description<br>
                <?php echo $field2name; ?></p>
                <p>Questions asked by <?php echo $field1name; ?></p>
                <?php 

                echo '<iframe name="hiddenFrame" class="hide"></iframe>
                <div>
                <form action="questions.php" method="post">
                <input type="hidden" value="'.$cid.'" name = "cid">
                <br><input class = "button-a" value="See" type="submit">
                </form></div>';
                ?>
    
  </div>

</div>
           

    </body>
</html>