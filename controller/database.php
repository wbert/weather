<?php

$servername="localhost";
$username="root";
$password="";
$databasename="weatherdb";


$connection = mysqli_connect($servername, $username, $password, $databasename);

if(!$connection)
  die("Can't connect to database: ". mysqli_connect_error());
?>