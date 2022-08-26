<!-- Función para llamar el header -->

<?php include('template_donador/header.php');?>

<?php 

    $id=(isset($_POST['id']))?$_POST['id']:"";
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $peso=(isset($_POST['peso']))?$_POST['peso']:"";
    $edad=(isset($_POST['edad']))?$_POST['edad']:"";
    $sexo=(isset($_POST['sexo']))?$_POST['sexo']:"";
    $estado=(isset($_POST['estado']))?$_POST['estado']:"";
    $tamanio=(isset($_POST['tamanio']))?$_POST['tamanio']:"";
    $especie=(isset($_POST['especie']))?$_POST['especie']:"";
    $raza=(isset($_POST['raza']))?$_POST['raza']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $foto=(isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $dispo='si';

// Hacemos el llamado a la conexión de la base de datos
    include('bd.php');

    switch($accion){

        case "registrar":

            $fecha= new DateTime();
            $nombreFoto=($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"foto.jpg";

            $tmpFoto=$_FILES["foto"]["tmp_name"];

            if($tmpFoto!=""){

                move_uploaded_file($tmpFoto,"../imagenes/".$nombreFoto);

            }

                
            $sentenciaSQL = $conexion->prepare("INSERT INTO mascota ( nombreM, peso, edadM, sexo,
                estadoSalud, tamaño, especie, raza, descripcion, foto ) VALUES ( '{$_POST['nombre']}'
                ,'{$_POST['peso']}','{$_POST['edad']}','{$_POST['sexo']}','{$_POST['estado']}',
                '{$_POST['tamanio']}','{$_POST['especie']}','{$_POST['raza']}','{$_POST['descripcion']}', '$nombreFoto' );");
            $sentenciaSQL->execute();
            // función para capturar el ultimo id registrado!
            $idMascota = $conexion->lastInsertId();

            $message= $sentenciaSQL->fetch(PDO::FETCH_LAZY);

                
                if ($sentenciaSQL == true) {
                    // Se consultará el id del usuario en la sesion y se capturará para agregarlo a la 
                    // tabla registro
                    $varsesion = $_SESSION['usuario'];
                    $sentenciaSQL = $conexion->prepare("SELECT * FROM usuario WHERE correo = '$varsesion'; ");
                    $sentenciaSQL->execute();
                    $row = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
                    $idUsuario = $row['idUsuario'];
                    
                    // luego de hacer el registro de la mascota, se insertará estos datos
                    // en la tabla registros
                    $fechaAct = date('Y-m-d');
                    
                    
                    $sentenciaSQL = $conexion->prepare("INSERT INTO registro (idUsuario, idMascota, fecha, tipo) 
                                                        VALUES('$idUsuario', '$idMascota', '$fechaAct', 'Donación'); ");
                    $sentenciaSQL->execute();

                }
                
        break;
                
    }
            
            
?>

<?php if (isset($message)) { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class=" btn-close btn-close-white" data-bs-dismiss="alert"></button>
        <strong>AVISO: <?php echo "¡ Mascota Registrada !"?> </strong> 
    </div>
<?php } ?>


<br></br>

<h1 class=" contenedor text-center bg-primary text-white p-2 text-uppercase">Registrar mascota</h1>

<form class="p-3 contenedor bg-primary bg-opacity-25" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" placeholder="ID de la mascota">
    </div>
    <div class="form-group">
        <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
        <input type="text" class="form-control" required name="nombre" id="nombre" placeholder="Ingresar nombre">
    </div>
    </br>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="peso" class="form-label">Peso <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required name="peso" id="peso" placeholder="Ingresar peso en gramos">
        </div>
        <div class="col-md-4">
            <label for="edad" class="form-label">Edad <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required name="edad" placeholder="Ingresar edad en meses">
        </div>
        <div class="col-md-4">
            <label for="sexo" class="form-label">Sexo <span class="text-danger">*</span></label>
            <select class="form-select" id="sexo" required name="sexo">

                <option selected value="">
                    <--Seleccione-->
                </option>

                <option value="M">Macho</option>
                <option value="H">Hembra</option>


            </select>
        </div>
    </div>
    </br>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="estado" class="form-label">Estado de salud <span class="text-danger">*</span></label>
            <select class="form-select" id="estado" required name="estado">
                <option value="" selected>
                    <--Seleccione-->
                </option>
                <option>Buena</option>
                <option>Regular</option>
                <option>Mala</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tamanio" class="form-label">Tamaño <span class="text-danger">*</span></label>
            <select class="form-select" id="tamanio" required name="tamanio">
                <option value="" selected>
                    <--Seleccione-->
                </option>
                <option>Pequeño</option>
                <option>Mediano</option>
                <option>Grande</option>
            </select>
        </div>
    </div>
    </br>
    <div class="form-group row ">
        <div class="col-md-6">
            <label for="especie" class="form-label">Especie<span class="text-danger">*</span></label>
            <select class="form-select" id="especie" required name="especie">
                <option value="" selected>
                    <--Seleccione-->
                </option>
                <option>Ave</option>
                <option>Canino</option>
                <option>Equino</option>
                <option>Felino</option>
                <option>Insecto</option>
                <option>Lagomorfo</option>
                <option>Pez</option>
                <option>Reptil</option>
                <option>roedor</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="raza" class="form-label">Raza<span class="text-danger">*</span></label>
            <input type="text" class="form-control" required name="raza" id="raza"
                placeholder="Ingrese la raza de la mascota">
        </div>
    </div>
    </br>
    <div class="col-md-12">
        <label for="descripcion" class="form-label">Descripción <span class="text-danger">*</span></label>
        <textarea class="form-control" id="descripcion" rows="3"
            style="margin-top: 0px; margin-bottom: 0px; height: 44px;" name="descripcion"></textarea>
    </div>
    </br>
    <div class="form-group">
        <label for="foto" class="form-label">Foto <span class="text-danger">*</span></label>
        <input class="form-control" type="file" required id="foto" name="foto">
    </div>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary fs-5 w-25 d-grid mx-auto mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Mascota
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white ">
        <h4 class="modal-title" id="exampleModalLabel">Registro de mascota</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-light">
       ¿ Está seguro que desea registrar la mascota ?
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" name="accion" value="registrar"
        class="btn btn-success">Aceptar</button>
      </div>
    </div>
  </div>
</div>

    </br>
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

<?php include('template_donador/footer.php');?>