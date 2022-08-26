<?php include('template_inicio/headerrol.php');?>

<?php

    include 'bd.php';
session_start();  
$varsesion = $_SESSION['usuario'];

$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE correo = '$varsesion'; ");
$sentencia->execute();
$row = $sentencia->fetch(PDO::FETCH_ASSOC);
$_SESSION['nombre'] = $row['nombre'];

if($varsesion == null || $varsesion = ''){
  header('location:../login.php');
}

?>

<h1 class=" contenedor text-center bg-primary text-white p-2 text-uppercase">
    BIENVENIDO : <?php echo  $_SESSION['nombre'];?></h1>
<!-- Contenedor de inicio -->


<div class="container bg-primary bg-opacity-25 border rounded-3">
    <div class="row col-md-12">
            <h3 class=" container text-center p-2 text-uppercase">Seleccione su rol</h3>
            <div class="col-md-6">
                <div class="card">
                    <figure class="rol">
                        <img src="img/dona.jpg" alt="">
                    </figure>
                    <div class="contenido">
                        <h5 class="card-title">DONAR UNA MASCOTA</h5>
                        <hr>
                        <a href="donador/menu_donador.php" class="btn btn-primary p-2 ">DONAR</a>    
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <figure class="rol">
                        <img src="img/adoptar.jpg" alt="">
                    </figure>
                    <div class="contenido">
                        <h5 class="card-title">ADOPTAR UNA MASCOTA</h5>
                        <hr >
                        <a href="adoptante/menu_adoptante.php" class="btn btn-primary p-2">ADOPTAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    



<!-- <div class="container w-100 bg-light rounded shadow">

    <div class="row align-items-stretch">

        <div class="col bg d-none d-lg-block rounded" align="center">
            </br>
            <div class="card">
                <img class="card-img-top" src="img/dona.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">DONAR UNA MASCOTA</h4>
                    <a href="donador/menu_donador.php" class="btn btn-success">DONAR</a>
                </div>
            </div>
            </br>
        </div>

        <div class="col bg d-none d-lg-block rounded" align="center">
            </br>
            <div class="card">
                <img class="card-img-top" src="img/adoptar.jpg" alt="">
                <div class="card-body">
                    <h4 class="card-title">ADOPTAR UNA MASCOTA</h4>
                    <a href="adoptante/menu_adoptante.php" class="btn btn-success">ADOPTAR</a>
                </div>
            </div>
            </br>
        </div>

    </div>
</div>
</div> -->

<!-- Función para llamar el footer -->

<?php include('template_inicio/footer.php');?>