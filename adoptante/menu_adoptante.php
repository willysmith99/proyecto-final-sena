<!-- Función para llamar el header -->

<?php include('template_adoptante/header.php');?>

<?php 

    $conexion = new PDO  ("mysql:host=localhost;dbname=prismapet","root","",);
    
    $varsesion = $_SESSION['usuario'];

    $sentencia = $conexion->prepare("SELECT * FROM usuario WHERE correo = '$varsesion'; ");
    $sentencia->execute();
    $row = $sentencia->fetch(PDO::FETCH_ASSOC);
    $_SESSION['nombre'] = $row['nombre'];

?>


<h1 class=" contenedor text-center bg-primary text-white p-2 text-uppercase">
    BIENVENIDO : <?php echo  $_SESSION['nombre'];?></h1>

<div class="container w-100 bg-light rounded shadow">
    <div class="row align-items-stretch">
        <div class="col bg-white p-5 rounded-end">
            <h3 class="fw-bold text-justify">Adoptar es darle una segunda oportunidad
                de una familia a una mascota
            </h3>

            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/periquito1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/perro1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/caballo1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/gato1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/araña1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/conejo1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/pez1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/iguana1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/roedor1.jpg" width="500" height="450" class="d-block w-100 rounded-3" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="col bg-white p-5 rounded-end">
            <h3 class="fw-bold text-justify">Consejos para los distintos tipos de mascotas que puedes adoptar en este
                sitio web</h3>
            </br>
            <div class="d-grid gap-2">
                <a href="consejos_caninos.php" class="btn btn-dark d-grid">Canino</a>
                <a href="consejos_felinos.php" class="btn btn-dark d-grid">Felino</a>
                <a href="consejos_equinos.php" class="btn btn-dark d-grid">Equino</a>
                <a href="consejos_roedor.php" class="btn btn-dark d-grid">Roedor</a>
                <a href="consejos_lagomorfos.php" class="btn btn-dark d-grid">Lagomorfo</a>
                <a href="consejos_aves.php" class="btn btn-dark d-grid">Aves</a>
                <a href="consejos_reptiles.php" class="btn btn-dark d-grid">Reptiles</a>
                <a href="consejos_insectos.php" class="btn btn-dark d-grid">Insectos</a>
                <a href="consejos_peces.php" class="btn btn-dark d-grid">Peces</a>
            </div>
        </div>
    </div>
    <div>
        </br>
        <h1 style="text-align: center">Recuerda que una mascota es una responsabilidad para toda la vida</h1>
        </br>
    </div>
</div>
<br></br>

<!-- Función para llamar el footer -->

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>


<?php include('template_adoptante/footer.php');?>
