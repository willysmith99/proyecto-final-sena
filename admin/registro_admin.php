<!-- Función para llamar el header -->

<?php include('template_admin/header.php');?>

<?php

$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$apellido=(isset($_POST['apellido']))?$_POST['apellido']:"";
$edad=(isset($_POST['edad']))?$_POST['edad']:"";
$documento=(isset($_POST['documento']))?$_POST['documento']:"";
$direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
$telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
$correo=(isset($_POST['correo']))?$_POST['correo']:"";
$contraseña=(isset($_POST['contraseña']))?$_POST['contraseña']:"";
$pin=(isset($_POST['pin']))?$_POST['pin']:"";
$usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
$id=(isset($_POST['id']))?$_POST['id']:""; 
$accion=(isset($_POST['accion']))?$_POST['accion']:""; 

$conexion=mysqli_connect("localhost","root","","prismapet");

switch($accion){
    
    case"registrar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO usuario (idUsuario,nombre,apellido,documento,edad,direccion,telefono,correo,contraseña,pin,tipo) 
        VALUES ('{$_POST['id']}','{$_POST['nombre']}','{$_POST['apellido']}','{$_POST['documento']}','{$_POST['edad']}','{$_POST['direccion']}','{$_POST['telefono']}','{$_POST['correo']}','{$_POST['contraseña']}','{$_POST['pin']}','{$_POST['usuario']}');");
        $sentenciaSQL->execute();

        header("Location:registro_admin.php");
        
        break;
}

?>

<br></br>

<h1 class=" container text-center bg-primary text-white p-2 text-uppercase">Crear cuenta</h1>


<form class="p-3 contenedor bg-primary bg-opacity-25" method="POST">

    <div class="form-group row mb-3">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
        </div>
        <div class="col-md-6">
            <label for="apellido" class="form-label">Apellido<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido"
                required>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-md-6">
            <label for="edad" class="form-label">Edad <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="edad" name="edad" placeholder="Ingresa tu edad" required>
        </div>
        <div class="col-md-6">
            <label for="documento" class="form-label">N° de documento<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="documento" placeholder="Ingresa tu documento de identidad"
                required>
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="direccion" class="form-label">Dirección<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="direccion"
            placeholder="Ingresa tu dirección con el barrio al final" required>
    </div>

    <div class="form-group row mb-3 ">
        <div class="col-md-6">
            <label for="telefono" class="form-label">N° de teléfono <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu N° de teléfono"
                required>
        </div>
        <div class="col-md-6">
            <label for="correo" class="form-label">Correo <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="correo" name="correo"
                placeholder="Ingresa tu correo electrónico" required>
        </div>
    </div>


    <div class="form-group row mb-3">
        <div class="col-md-6">
            <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password" name="contraseña"
                placeholder="Ingresa tu contraseña" required>
        </div>
        <div class="col-md-6">
            <label for="rep_Password" class="form-label">Repetir contraseña <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="rep_Password" placeholder="Ingresa nuevamente tu contraseña"
                required>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-md-6">
            <label for="pin" class="form-label">Pin <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="pin" name="pin" placeholder="Ingresa tu pin" required>
        </div>
        <div class="col-md-6">
            <label for="rep_Pin" class="form-label">Repetir pin <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="rep_Pin" placeholder="Ingresa nuevamente tu pin" required>
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="tip_U" class="form-label" style="display:none;">Tipo de Usuario</label>
        <input type="hidden" class="form-control" value="Admin" name="usuario">
    </div>
    <div class="form-group mb-3">
        <label for="id_U" class="form-label" style="display:none;">Id Usuario</label>
        <input type="hidden" class="form-control" value="" name="id">
    </div>

    <button type="submit" name="accion" value="registrar"
        class="btn btn-primary fs-5 w-25 mt-3 mb-3 d-grid mx-auto">Registrar</button>
    <div class="text-center">
        <span>Al darle click en Registrar estás aceptando todas nuestras <a href="politicas.php"
                target="_blank">Políticas
            </a> de uso de datos y del aplicativo web</span>
    </div>

</form>

<br></br>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>
<!-- Función para llamar el footer -->

<?php include('template_admin/footer.php');?>