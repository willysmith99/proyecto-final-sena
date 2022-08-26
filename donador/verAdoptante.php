
<?php include('template_donador/header.php');?>

<?php include ('bd.php'); 

$varsesion = $_SESSION['usuario'];

    if (isset($_GET['id'])) {
        
        $idSolicitud = $_GET['id'];
        $accion = $_GET['action'];

        $sentenciaSql = $conexion->prepare("SELECT * FROM solicitud WHERE idSolicitud = '$idSolicitud';");
        $sentenciaSql->execute();
        $row = $sentenciaSql->fetch(PDO::FETCH_ASSOC);
        $idAdop = $row['idAdoptante'];


        $sentenciaSql = $conexion->prepare("SELECT * FROM usuario WHERE idUsuario = '$idAdop'; ");
        $sentenciaSql->execute();
        $listaDatos = $sentenciaSql->fetch(PDO::FETCH_ASSOC);

    }

?>


<h1 class=" container w-75 text-center bg-primary mb-3 text-white p-2 text-uppercase">Datos Adoptante</h1>

<div class="container w-75 bg-light rounded shadow text-center ">
    <div class="row col-md-12">
            <div class="form-group row mt-3 ">
                <div class="col-md-6">
                    <h5 class="">Nombres</h5>
                    <p><?php echo $listaDatos['nombre'];
                        echo " ";
                        echo $listaDatos['apellido']; ?> </p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h5>N° Documento</h5>
                    <p><?php echo $listaDatos['documento']; ?></p>
                    <hr>
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col-md-6">
                    <h5>Correo</h5>
                    <p><?php echo $listaDatos['correo']; ?></p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h5>Teléfono</h5>
                    <p><?php echo $listaDatos['telefono']; ?></p>
                    <hr>
                </div>
            </div>
            <div class="btn-group w-50 d-flex m-auto mb-5 mt-3" role="group">
                                
                <a class="btn btn-primary" href="solicitud.php?action=aceptar&id=<?php echo $row['idSolicitud']; ?>">Aceptar</a>
                &nbsp;
                <a class="btn btn-danger" href="solicitud.php?action=rechazar&id=<?php echo $row['idSolicitud']; ?>">Rechazar</a> 
            </div>
           
    </div>
</div>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>

<?php include('template_donador/footer.php');?>