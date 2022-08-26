<?php 

$email=$_POST['email'];
$password=$_POST['password'];
$mensaje= "Error: el usuario o contraseña son
incorrectos";

$conexion=mysqli_connect("localhost","root","","prismapet");    

$consulta="SELECT*FROM usuario where correo='$email' and contraseña='$password'and tipo='Admin'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:./admin/menu_admin.php");
    session_start();
    $_SESSION['usuario']=$email;
}else{
    ?>
<?php

include("loginadmin.php");
$mensaje
?>

<?php
}
?>