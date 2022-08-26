<?php include('template_adoptante/header.php'); ?>

<?php

$conexion = new PDO("mysql:host=localhost;dbname=prismapet", "root", "",);

$consulta = "SELECT * FROM mascota WHERE idMascota='{$_GET['id']}'";
$resultado = $conexion->query($consulta);
$row = $resultado->fetch(PDO::FETCH_LAZY);


?>

<h1 class=" container text-center bg-primary text-white p-2 mb-3 text-uppercase">Información de la mascota</h1>

<div class="container w-100 bg-light rounded shadow ">
    <div class="row">
        <div class="col rounded">

            <img src="../imagenes/<?php echo $row['foto']; ?>" class="rounded mt-5" width="570" height="600" alt="">

        </div>
        <div class="col bg-light p-4 rounded-end">
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" id="id" placeholder="ID de la mascota">
            </div>
            <div class="form-group">
                <h3 class="">Nombre </h3>
                <p><?php echo $row['nombreM']; ?> </p>
                <hr>

            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <h3>Peso </h3>
                    <p><?php echo $row['peso']; ?> Gramos</p>
                    <hr>
                </div>
                <div class="col-md-4">
                    <h3>Edad </h3>
                    <p><?php echo $row['edadM']; ?> Meses</p>
                    <hr>
                </div>
                <div class="col-md-4">
                    <h3>Sexo </h3>
                    <p><?php echo $row['sexo']; ?> </p>
                    <hr>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <h3>Salud </h3>
                    <p><?php echo $row['estadoSalud']; ?> </p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h3>Tamaño </h3>
                    <p><?php echo $row['tamaño']; ?> </p>
                    <hr>
                </div>
            </div>

            <div class="form-group row ">
                <div class="col-md-6">
                    <h3>Especie </h3>
                    <p><?php echo $row['especie']; ?> </p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h3>Raza </h3>
                    <p><?php echo $row['raza']; ?> </p>
                    <hr>
                </div>
            </div>

            <div class="col-md-12">
                <h3>Descripción </h3>
                <p><?php echo $row['descripcion']; ?> </p>
                <hr>
            </div>
            <div class="btn-group mt-3 d-flex justify-content-center">
                <a class="btn btn-primary" href="formulario_adopcion.php?id=<?php echo ($row['idMascota'] ??= 'default value') ?>">Adoptar</a>
                &nbsp;
                <a class="btn btn-danger" href="ver_mascota.php">Cancelar</a>
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


<?php include('template_adoptante/footer.php'); ?>