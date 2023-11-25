<?php

require 'config.php';

//elementos de un arreglo
$columns = ['no_emp', 'nombre', 'apellido', 'genero', 'fecha_ingreso'];

$table = "empleados";

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

$where = '';

if($campo != null){
    $where = "WHERE (";

    $cont = count($columns);
    for($i = 0; $i < $cont; $i++){
        $where .= $columns[$i] . " LIKE '%".$campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

$sql = "SELECT ". implode(", ", $columns) . " 
FROM $table
$where ";

$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

$html = '';

if($num_rows > 0){
while($row = $resultado->fetch_assoc()){
    $html .= '<tr>';
    $html .= '<td>'.$row['no_emp'].'</td>';
    $html .= '<td>'.$row['nombre'].'</td>';
    $html .= '<td>'.$row['apellido'].'</td>';
    $html .= '<td>'.$row['genero'].'</td>';
    $html .= '<td>'.$row['fecha_ingreso'].'</td>';
    $html .= '<td><a href="">Editar</a></td>';
    $html .= '<td><a href="">Eliminar</a></td>';

}} else {
    $html .= '<tr>';
    $hmtl .= '<td colspan="7">Sin resultados</td>';
    $html .= '<>tr';
}


echo json_encode($html, JSON_UNESCAPED_UNICODE);