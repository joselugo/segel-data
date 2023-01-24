<?php
function conectar()
{
  $credencial = credencial();
  $conexion = mysqli_connect($credencial['server'], $credencial['user'], $credencial['password'], $credencial['database'] );
  if ($conexion->connect_error) {
    die($conexion->connect_error);
  } else {
    return $conexion;
  }
  return $conexion;
}



function credencial(){
$data['user'] = "root";
$data['password'] = "bistec9016Hop";
$data['server']= "localhost";
$data['database'] = "Mikrowisp6";

return $data;
}

?>