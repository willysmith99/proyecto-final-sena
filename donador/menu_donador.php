<!-- Función para llamar el header -->

<?php include('template_donador/header.php');?>

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
            <h2 class="fw-bold text-center">Donar es darle una segunda oportunidad
                de una familia a una mascota
            </h2>

            <img src="../img/familia.jpg" class="img-fluid" alt="...">

        </div>

        <div class="col bg-white p-5 rounded-end" align="center">
            <h2 class="fw-bold text-center">Al donar una mascota recuerda tener en cuenta:</h2>
            </br>
            <img src="../img/vet.png" class="img-fluid" alt="..." width="100" height="100">
            <br></br>
            <h4 style="color: black">Debe de estar en el mejor estado posible</h4>
            <h4 style="color: black">Deber estar esterilizada según su especie</h4>
            <h4 style="color: black">Debe estar vacunada según su especie</h4>
            <h4 style="color: black">En lo posible tener su carnet</h4>
            <h4 style="color: black">Debe estar desparacitada según su especie</h4>
            <h4 style="color: black">Especificar si requiere cuidados adicionales o medicamentos</h4>
        </div>
    </div>
    <div>
        </br>
        <h1 style="text-align: center">Recuerda que el Donar una mascota se debe de hacer con responsabilidad
        </h1>
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

<?php include('template_donador/footer.php');?>