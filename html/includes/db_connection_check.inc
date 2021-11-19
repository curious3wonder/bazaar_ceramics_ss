<?php

$conn = mysqli_connect("localhost", "root", "krishjinsil12", "bazaarceramics_db");

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
?>	