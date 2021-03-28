<?php
include_once("config.php");
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["valid"]);
session_destroy();
header("location:dashboard.html");
echo "<a href='dashboard.html'>Home</a>"
?>