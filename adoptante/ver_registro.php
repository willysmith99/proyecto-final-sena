<?php include('template_adoptante/header.php'); ?>
<?php
$conexion = new PDO("mysql:host=localhost;dbname=prismapet", "root", "");

$txtID = (isset($_POST["txtID"])) ? $_POST["txtID"] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


$varsesion = $_SESSION['usuario'];


switch ($accion) {
    case 'eliminar':

        $sentenciaSQL = $conexion->prepare("DELETE FROM solicitud
                                            WHERE idRegistro=:idRegistro");
        $sentenciaSQL->bindParam(":idRegistro", $txtID);
        $sentenciaSQL->execute();
        $criatura = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        break;
}

$varsesion = $_SESSION['usuario'];
$sentenciaSQL = $conexion->prepare("SELECT * FROM usuario WHERE correo = '$varsesion'; ");
$sentenciaSQL->execute();
$row = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
$idUsuario = $row['idUsuario'];


$sentenciaSQL = $conexion->prepare("SELECT solicitud.fecha, solicitud.proceso, mascota.nombreM as 'mascota', mascota.especie, 
                                        mascota.raza, mascota.foto, registro.idRegistro
                                    FROM usuario
                                    INNER JOIN registro ON registro.idUsuario = Usuario.idUsuario
                                    INNER JOIN solicitud ON registro.idRegistro = solicitud.idRegistro
                                    INNER JOIN mascota ON registro.idMascota = mascota.idMascota
                                    WHERE solicitud.proceso = 'Adopción' AND solicitud.idAdoptante = '$idUsuario'; ");
$sentenciaSQL->execute();
$ListaRegistro = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if (isset($criatura)) { ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class=" btn-close btn-close-white" data-bs-dismiss="alert"></button>
        <strong>AVISO:</strong> Registro eliminado.
    </div>
<?php } ?>


<div class="container">
    <div class="row">
        <h2 class=" text-center mb-3 text-uppercase">Solicitud de adopciones</h2>
        <table class="table border-primary">
            <thead class="table table-primary" > 
                <tr class="text-center">
                    
                    <th scope="col">FECHA</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">MASCOTA</th>
                    <th scope="col">ESPECIE</th>
                    <th scope="col">RAZA</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">ELIMINAR</th>
                </tr>
            </thead>

            <?php foreach ($ListaRegistro as $registro) { ?>
                <tbody>
                        <tr>

                            <td class="align-middle text-center"><?php echo $registro['fecha'] ?></td>
                            <td class="align-middle text-center"><?php echo $registro['proceso'] ?></td>
                            <td class="align-middle text-center"><?php echo $registro['mascota'] ?></td>
                            <td class="align-middle text-center"><?php echo $registro['especie'] ?></td>
                            <td class="align-middle text-center"><?php echo $registro['raza'] ?></td>
                            <td class="align-middle text-center">
                                <img src="../imagenes/<?php echo $registro["foto"]; ?>" class="rounded" width="100" height="100" alt="" srcset="">
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $registro["idRegistro"]; ?>" />
                                     <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Eliminar
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white ">
                                                    <h4 class="modal-title" id="exampleModalLabel">Cancelar solicitud de mascota</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    ¿ Está seguro que desea cancelar la solicitud ?
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" name="accion" value="eliminar" class="btn btn-success">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>

                        </tr>
                    </tbody>
            <?php } ?>
            </table>
    </div>
</div>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>

<?php include('template_adoptante/footer.php'); ?>