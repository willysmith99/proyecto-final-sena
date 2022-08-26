<?php
    include 'bd.php';

session_start(); 

$varsesion = $_SESSION['usuario'];

$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE correo = '$varsesion'; ");
$sentencia->execute();
$row = $sentencia->fetch(PDO::FETCH_ASSOC);

$_SESSION['id'] = $row['idUsuario'];

if($varsesion == null || $varsesion = ''){
  header('location:../login.php');
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/paws.png">

    <title>Prisma Pet</title>

    <!-- Hoja de estilo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css" />

</head>

<body>

    <!-- Barra del menú -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="nav navbar-nav ">
            <a class="nav-item nav-link" href="menu_donador.php">Inicio</a>
            <a class="nav-item nav-link" href="registrar_mascota.php">Donar mascota</a>
            <a class="nav-item nav-link" href="ver_registro.php">Reportes</a>
            <a class="nav-item nav-link" href="gestion_mascotas.php">Gestionar mascota</a>
            <a class="nav-item nav-link" href="nosotros.php">Acerca de Prisma Pet</a>
            <a class="nav-item nav-link" href="politicas.php">Políticas</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Perfil</a>
                <div class="dropdown-menu ">
                    <a class="dropdown-item" href="gestion_donador.php?id=<?php echo $_SESSION['id'] ;?>">Gestionar Cuenta</a>
                    <a class="dropdown-item" href="../rol.php">Cambiar Rol</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
                </div>
            </li>
        </div>
    </nav>

    <!-- Inicio del contenido para las vistas principales -->
    <br></br>
    <div class="container">
        <div class="row">