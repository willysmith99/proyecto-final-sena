<?php include('template_admin/header.php'); ?>

<?php include('bd.php');

$varsesion = $_SESSION['usuario'];

if (isset($_GET['id'])) {

    $idRegistro = $_GET['id'];
    $action = $_GET['action'];

    $sentenciaSql = $conexion->prepare("SELECT * FROM registro WHERE idRegistro = '$idRegistro' AND tipo = 'Donación';");
    $sentenciaSql->execute();
    $row = $sentenciaSql->fetch(PDO::FETCH_ASSOC);
    $idDona = $row['idUsuario'];
    $idMascota = $row['idMascota'];


    $sentenciaSql = $conexion->prepare("SELECT * FROM usuario WHERE idUsuario = '$idDona'; ");
    $sentenciaSql->execute();
    $listaDatos = $sentenciaSql->fetch(PDO::FETCH_ASSOC);
}

?>


<h1 class=" container w-75 text-center bg-primary mb-3 text-white p-2 text-uppercase">Datos Donante</h1>

<div class="container w-75 bg-light rounded shadow">
    <div class="row col-md-12">
        <div class="form-group row mt-3 text-center">
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

        <div class="form-group row mt-3 text-center">
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
        <div class="btn-group w-25 d-flex m-auto" role="group">
            
            
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Eliminar Registro
                </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white ">
                            <h4 class="modal-title" id="exampleModalLabel">Eliminar registro de mascota</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-light">
                            ¿ Está seguro que desea eliminar el registro de la mascota ?
                        </div>
                        <div class="modal-footer bg-light">
                            <a class="btn btn-danger" href="registro_donacion.php">Cancelar</a>
                            <a class="btn btn-success" href="eliminar_mascota.php?action=borrar&id=<?php echo $idMascota; ?>">Aceptar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>

<?php include('template_admin/footer.php'); ?>