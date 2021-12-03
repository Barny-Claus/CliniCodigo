<?php
/*este usuario y contraseña son traídos desde el 
  archivo index y son referentes a los usuarios
  que hay DENTRO de la tabla usuarios en la 
  base de datos*/
$usuario=$_POST['usuario'];
$clave=$_POST['contrasena'];


/*Por seguridad no se colocarán los valores reales usados, pero 
  en su lugar se colocará el nombre de qué valor va en dicho 
  sitio para lograr la conexión*/
$host="localhost";			//se usa localhost pues se almacenan en el mismo sitio y no en una website distinta o dominio
$user="UsuarioDeLaBaseDeDatos";
$pass="ContraseñaDeLaBaseDeDatos";
$dbname="NombreDeLaBaseDeDatos";
 /*comando para la conexión*/
$conexion=mysqli_connect($host, $user, $pass , $dbname);

/*en este punto ya estamos conectados y procedemos a hacer la consulta 
sobre los usuarios DENTRO de la base de datos para tener permisos de uso*/

$consulta="SELECT * FROM usuarios WHERE username='$usuario' and password='$clave'";//las variables capturadas en index
 //comparativa con los que se encuentran en la base de datos
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
//si es correcto, manda a la siguiente página del sitio
if($filas>0){
	header("location:SiguientePagina.html");
}
//sino, regresa un mensaje de error sencillo
else{
	echo "Error en la autenticación";
}
//liberamos las variables auxiliares
mysqli_free_result($resultado);
mysqli_close($conexion);
