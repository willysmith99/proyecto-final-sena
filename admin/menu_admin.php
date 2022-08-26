<!-- Función para llamar el header -->

<?php include('template_admin/header.php');?>

<?php 

include 'bd.php';

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
            <h2 class="fw-bold text-center">Revisa con regularidad los registros para evitar el tráfico de la fauna
                silvestre
            </h2>
            </br>
            <img src="../img/titi.jpg" class="img-fluid" alt="...">

        </div>
        <div class="col bg-white p-5 rounded-end" align="center">
            <h2 class="fw-bold text-center">Contactos para la protección animal y de fauna silvestre</h2>
            </br>

            <img src="../img/policia.png" class="img-fluid" alt="..." width="180" height="180">

            <br></br>
            <h2 class="text-center">POLICIA (Protección Ambiental)</h2>
            <h2 class="text-center">Unidad policial: DEANT</h2>
            <h4 class="text-center">Cobertura: ANTIOQUIA</h4>
            <h4 class="text-center">Correo: deant.gupae@policia.gov.co</h4>
            <h4 class="text-center">Dirección: Calle 71 65-20 barrio el Volador Medellin</h4>
            <h4 class="text-center">Teléfono: 5904930 ext 22472</h4>
            <h4 class="text-center">Horario: 07:00 a 17:00 horas</h4>

        </div>
    </div>
    <div>
        </br>
        <h1 style="text-align: center">Recuerda administrar con resposabilidad los registros de las mascotas</h1>
        </br>
    </div>
</div>
<br></br>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>
<!-- Función para llamar el footer -->

<?php include('template_admin/footer.php');?>