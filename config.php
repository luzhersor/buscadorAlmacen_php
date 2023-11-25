<?php

$conn = new mysqli("localhost", "root","Lutita17","almacen", 3306);


if($conn -> connect_error){
   die('Error de conexion ' . $conn->connect_error); 
}