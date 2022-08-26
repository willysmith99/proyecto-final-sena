<?php include('template_donador/header.php'); ?>


<?php

include 'bd.php';
$varsesion = $_SESSION['usuario'];

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sentenciaSql = $conexion->prepare("SELECT * FROM usuario WHERE idUsuario = '$id'; ");
    $sentenciaSql->execute();
    $row = $sentenciaSql->fetch(PDO::FETCH_LAZY);
}


if (isset($_POST['actualizar'])) {

    $id = $_GET['id'];
    $consultaSQL = "SELECT * FROM usuario WHERE idUsuario = '$id'; ";
    $resultado = $conexion->query($consultaSQL);
    $row = $resultado->fetch(PDO::FETCH_ASSOC);

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : $row['nombre'];
    $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : $row['apellido'];
    $edad = (isset($_POST['edad'])) ? $_POST['edad'] : $row['edad'];
    $documento = (isset($_POST['documento'])) ? $_POST['documento'] : $row['documento'];
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : $row['direccion'];
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : $row['telefono'];
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : $row['correo'];
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : $row['tipo'];
    $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

    if ($_POST['contraseña'] && $_POST['pin'] != '') {

        $contraseña = $_POST['contraseña'];
        $pin = $_POST['pin'];
    } else {

        $contraseña = $row['contraseña'];
        $pin = $row['pin'];
    }

    $sentenciaSQL = $conexion->prepare("UPDATE usuario SET nombre='$nombre', apellido='$apellido', documento='$documento',
                                        edad='$edad', direccion='$direccion', telefono='$telefono', correo='$correo', 
                                        contraseña='$contraseña', pin='$pin' WHERE idUsuario = '$id'; ");
    $sentenciaSQL->execute();

    header("Location:menu_donador.php");
}

if (isset($_POST['cancelar'])) {

    header('Location:menu_donador.php');
}


?>


<?php if (isset($sentenciaSQL)) { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class=" btn-close btn-close-white" data-bs-dismiss="alert"></button>
        <strong>AVISO:</strong> Datos actualizados correctamente.
    </div>
<?php } ?>



<h1 class=" container text-center bg-primary text-white p-2 text-uppercase">Actualizar Datos</h1>

<form class="p-3 contenedor bg-primary bg-opacity-25" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $row['nombre'];; ?>" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $row['apellido']; ?>" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-md-6">
                        <label for="edad" class="form-label">Edad <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $row['edad']; ?>" class="form-control" id="edad" name="edad" placeholder="Ingresa tu edad">
                    </div>
                    <div class="col-md-6">
                        <label for="documento" class="form-label">N° de documento<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $row['documento']; ?>" class="form-control" name="documento" placeholder="Ingresa tu documento de identidad">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="direccion" class="form-label">Dirección<span class="text-danger">*</span></label>
                    <input type="text" value="<?php echo $row['direccion']; ?>" class="form-control" name="direccion" placeholder="Ingresa tu dirección">
                </div>

                <div class="form-group row mb-3 ">
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">N° de teléfono <span class="text-danger">*</span></label>
                        <input type="tel" value="<?php echo $row['telefono']; ?>" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu N° de teléfono">
                    </div>
                    <div class="col-md-6">
                        <label for="correo" class="form-label">Correo <span class="text-danger">*</span></label>
                        <input type="email" value="<?php echo $row['correo']; ?>" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico">
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="contraseña" placeholder="Ingresa tu contraseña">
                    </div>
                    <div class="col-md-6">
                        <label for="pin" class="form-label">Pin <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pin" name="pin" placeholder="Ingresa tu pin">
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="tip_U" class="form-label" style="display:none;">Tipo de Usuario</label>
        <input type="hidden" class="form-control" placeholder="User" disabled="">
    </div>
    <div class="form-group mb-3">
        <label for="id_U" class="form-label" style="display:none;">Id Usuario</label>
        <input type="hidden" class="form-control" placeholder="0" disabled="">
    </div>

    <div class="btn-group mt-3 w-75 d-flex mx-auto" role="group">

            <!-- Button trigger modal -->
            <button type="button" name="actualizar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Actualizar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white ">
                            <h4 class="modal-title" id="exampleModalLabel">Actualizar datos</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-light">
                            ¿ Está seguro que desea actualizar los datos ?
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" name="actualizar" class="btn btn-success">Aceptar</button>

                        </div>
                    </div>
                </div>
            </div>
            &nbsp;
            <button type="submit" name="cancelar" class="btn btn-danger ">Cancelar</button>
        
    </div>

</form>

<br></br>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
    var myLandbot = new Landbot.Livechat({
        configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
    });
</script>

<?php include('template_donador/footer.php'); ?>