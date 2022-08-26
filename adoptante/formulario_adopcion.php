<?php include('template_adoptante/header.php'); ?>

<?php
// Hacemos el llamado a la conexión de la base de datos
$conexion = new PDO("mysql:host=localhost;dbname=prismapet", "root", "");
$id = (isset($_GET['id'])) ? $_GET['id'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";



$consulta = "SELECT usuario.idUsuario, nombre, apellido, documento, direccion, telefono, correo,    
                    mascota.nombreM, mascota.peso, mascota.edadM, mascota.sexo, mascota.estadoSalud,
                    mascota.tamaño,  mascota.especie,  mascota.raza,  mascota.descripcion 
            FROM usuario
            INNER JOIN registro ON registro.idUsuario = usuario.idUsuario
            INNER JOIN mascota ON mascota.idMascota = registro.idMascota
            WHERE  (registro.tipo='Donación' OR registro.tipo='Adopción') AND mascota.idMascota='{$_GET['id']}'";

$resultado = $conexion->query($consulta);
$row = $resultado->fetch(PDO::FETCH_ASSOC);

switch ($accion) {

    case "registrar":

        $sentenciaSQL = $conexion->prepare("SELECT * FROM mascota WHERE mascota.idMascota='{$_GET['id']}'");
        $sentenciaSQL->execute();

        // Se consultará el id del usuario en la sesion y se capturará para agregarlo a la 
        // tabla registro
        $varsesion = $_SESSION['usuario'];
        $sentenciaSQL = $conexion->prepare("SELECT * FROM usuario WHERE correo = '$varsesion'; ");
        $sentenciaSQL->execute();
        $row = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
        $idUsuario = $row['idUsuario'];

        //
        $sentenciaSQL = $conexion->prepare("SELECT * FROM registro WHERE idMascota = '{$_GET['id']}'; ");
        $sentenciaSQL->execute();
        $row1 = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
        $idReg = $row1['idRegistro'];
        $idDon = $row1['idUsuario'];


        // luego de hacer el registro de la mascota, se insertará estos datos
        // en la tabla registros
        $fechaAct = date('Y-m-d');
        $sentenciaSQL = $conexion->prepare("INSERT INTO solicitud (idSolicitud, idRegistro, idDonante, idAdoptante, proceso, fecha) 
                                            VALUES (NULL, '$idReg', '$idDon', '$idUsuario', 'Adopción', '$fechaAct'); ");
        $sentenciaSQL->execute();

        header("Location:ver_registro.php");
        break;
}

?>

<h1 class=" container w-75 text-center bg-primary mb-3 text-white p-2 text-uppercase">Formulario de Adopción</h1>

<div class="container w-75 bg-light rounded shadow ">
    <div class="row col-md-12">
        <h2 class=" text-center mb-3 text-capitalize mt-2 mb-4">Datos Donante</h2>
        <form method="POST" class="text-center">
            <div class="form-group row mt-3 ">
                <div class="col-md-6">
                    <h5 class="">Nombres</h5>
                    <p><?php echo $row['nombre'];
                        echo " ";
                        echo $row['apellido']; ?> </p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h5>N° Documento</h5>
                    <p><?php echo $row['documento']; ?></p>
                    <hr>
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col-md-6">
                    <h5>Correo</h5>
                    <p><?php echo $row['correo']; ?></p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h5>Teléfono</h5>
                    <p><?php echo $row['telefono']; ?></p>
                    <hr>
                </div>
            </div>
    </div>
</div>

<div class="container w-75 bg-light rounded shadow mt-4 ">
    <div class="row col-md-12 text-center">
        <h2 class=" text-center mb-3 text-capitalize mt-2 mb-4">Datos Mascota</h2>
        <div class="form-group row mt-3 ">
            <div class="col-md-4">
                <h5 class="">Nombre</h5>
                <p><?php echo $row['nombreM']; ?> </p>
                <hr>
            </div>
            <div class="col-md-4">
                <h5>Peso</h5>
                <p><?php echo $row['peso']; ?> Gramos</p>
                <hr>
            </div>
            <div class="col-md-4">
                <h5>Edad</h5>
                <p><?php echo $row['edadM']; ?> Meses</p>
                <hr>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="col-md-4">
                <h5>Sexo</h5>
                <p><?php echo $row['sexo']; ?></p>
                <hr>
            </div>
            <div class="col-md-4">
                <h5>Salud</h5>
                <p><?php echo $row['estadoSalud']; ?></p>
                <hr>
            </div>
            <div class="col-md-4">
                <h5>Tamaño</h5>
                <p><?php echo $row['tamaño']; ?></p>
                <hr>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="col-md-6">
                <h5>Especie</h5>
                <p><?php echo $row['especie']; ?></p>
                <hr>
            </div>
            <div class="col-md-6">
                <h5>Raza</h5>
                <p><?php echo $row['raza']; ?></p>
                <hr>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <h5>Descripción</h5>
            <p><?php echo $row['descripcion']; ?></p>
            <hr>
        </div>
    </div>
</div>

<h1 class=" container w-75 text-center bg-primary text-white p-2 text-uppercase mt-5">Términos para la Adopción</h1>

<div class="container w-75 bg-primary bg-opacity-25 shadow rounded mb-3">

    <div class="row">
        <div class="col mt-3">
            <ol>
                <li class="mb-2"> El compromiso de adopción genera por parte del adoptante, responder por el bienestar y la salud de su
                    mascota en cualquier situación.
                    Debe proporcionarle un trato digno y con sentido humanitario.
                </li>
                <li class="mb-2"> La mascota debe
                    mantenerse en condiciones locativas apropiadas en cuanto a luminosidad, movilidad, aireación, aseo e
                    higiene. Así mismo se le suministrara bebida y alimento en cantidad y calidad suficiente, así como
                    medicinas
                    y los cuidados necesarios para asegurar su salud, bienestar y para evitarle daño, enfermedad o muerte
                    según los
                    requerimientos de su especie.
                </li>
                <li class="mb-2"> Se le
                    suministrara abrigo apropiado contra la intemperie, se evitara que permanezca en la calle y que sea
                    abandonado a su suerte.
                </li>
                <li class="mb-2"> Se le educaráen cuanto a las costumbres de su nuevo hogar, con cariño, paciencia, dedicación y
                    respeto.
                </li>
                <li class="mb-2"> Se respetara el estado de su cola y orejas, tal y como fue recibido luego de la adopción sin
                    posibilidad
                    de ningún tipo de mutilación estética.
                </li>
                <li class="mb-2"> Según la especie y la raza de la mascota adoptada se deberá esterilizar en caso de que no aún no se
                    haya
                    hecho.
                </li>
                <li class="mb-2"> El animal sera adoptado única y exclusivamente para compañía y no podra ser utilizado para: caza de
                    cualquier
                    tipo y circunstancia, experimentación de cualquier tipo, participación de peleas o enfrentamientos con
                    otros
                    animales, reproducción con fines de lucro, circos o espectáculos.
                </li>
                <li class="mb-2"> En caso de no poder seguir manteniendo a su mascota
                    adoptada, deberá comunicarse con la persona que dona la mascota.
                </li>
            </ol>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="form-check text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required='true'>
                    <label class="form-check-label" for="flexCheckChecked">
                        Acepto y entiendo los términos de adopción expuesto anteriormente.
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" name="accion" value="registrar" class="btn btn-primary">Solicitar Adopción</button>

        </div>


        <span class="text-center mb-4">Al darle click en Solicitar Adopción estás aceptando todas nuestras <a href="politicas.php" target="_blank">Políticas
            </a> de uso de datos y del aplicativo web</span>



    </div>



    </form>
</div>
</div>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
    var myLandbot = new Landbot.Livechat({
        configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
    });
</script>
<?php include('template_adoptante/footer.php'); ?>