<!-- Función para llamar el header -->

<?php include('template_inicio/header.php');?>

<?php

$conexion= new PDO ("mysql:host=localhost;dbname=prismapet","root","",);

$correo=(isset($_POST['email']))?$_POST['email']:"";
$pin=(isset($_POST['pin']))?$_POST['pin']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case"recuperar":
$consultaSQL = "SELECT * FROM usuario WHERE correo ='$correo' and pin='$pin' ";
$resultado = $conexion->query($consultaSQL);
$row = $resultado->fetch(PDO::FETCH_ASSOC);
break;

case"limpiar":
    header("Location:recuperar_contraseña.php");
break;
}
?>

<br></br>

<div class="container w-50">
    <h3 class=" contenedor text-center bg-primary text-white p-3 text-uppercase">Recuperar contraseña</h3>

    </br>
    <form method="post" class="contenedor bg-primary bg-opacity-25">
        <br></br>
        <div class="form-group text-center">
            <label for="email" class="form-label">Ingrese su Correo electrónico<span
                    class="text-danger">*</span></label>
            <input type="email" class="form-control w-50 m-auto" id="rec_Email" placeholder="EMAIL" name="email">
        </div>
        <br></br>
        <div class="form-group mb-5 text-center">
            <label for="password" class="form-label">Ingrese su pin<span class="text-danger">*</span></label>
            <input type="password" class="form-control w-50 m-auto" id="rec_Pin" placeholder="pin" name="pin">
        </div>

        <hr class="w-75 m-auto bg-black">
        <hr class="w-75 m-auto bg-black">
        <hr class="w-75 m-auto bg-black">

        <fieldset disabled="">
            <div class="form-group text-center">
                </br>
                <label for="password" class="form-label">Su contraseña es:</label>
                <input class="form-control w-50 m-auto" id="disabledInput" type="text" disabled=""
                    value="<?php echo ($row['contraseña']??='');?>">
            </div>
        </fieldset>
        <div class="btn-group mt-2 w-50 d-flex mx-auto" role="group" >
            <button type="submit" class="btn btn-primary fs-5 w-25 d-grid mx-auto mt-3 mb-3" name="accion"
                value="recuperar">
                Recuperar
            </button>
            <button type="submit" class="btn btn-danger fs-5 w-25 d-grid mx-auto mt-3 mb-3" name="accion"
                value="limpiar">
                Limpiar
            </button>
        </div>
        <div class="text-center fs-5">
            <span><a href="login.php">Ingresar</a></span>
        </div>
        
        </br>
    </form>

</div>
</br>


<!-- Función para llamar el footer -->

<?php include('template_inicio/footer.php');?>