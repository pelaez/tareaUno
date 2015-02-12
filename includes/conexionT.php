<?php

//datos para conectar

$host="localhost";
$user="root";
$password="";
$db="cursos_dmi";
//se crea una variable conexion//
$con=mysqli_connect($host,$user,$password)or die("problemas al conectar");

mysqli_select_db($con,$db)or die("probelmas al seleccionar la base de datos");
?>