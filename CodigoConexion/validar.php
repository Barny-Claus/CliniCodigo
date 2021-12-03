<?php
$usuario=$_POST['usuario'];
$clave=$_POST['contrasena'];

$host="localhost";
$user="id17782236_clinchansey";
$pass="&rx=WC+^H~?OW7%t";
$dbname="id17782236_clinicachansey";

$conexion=mysqli_connect($host, $user, $pass , $dbname);

$consulta="SELECT * FROM usuarios WHERE username='$usuario' and password='$clave'";

$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
	header("location:queleduele.html");
}
else{
	echo "Error en la autenticación";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
