
<?php include('template_donador/header.php');?>

<?php 

    include 'bd.php';

        $mensaje = "¡Mascota Eliminada!";

        
        if (isset($_GET['id'])) {
            
            $id = $_GET['id'];
            $sentenciaSql = $conexion->prepare("SELECT * FROM mascota WHERE idMascota = '$id'; ");
            $sentenciaSql->execute();
            $row = $sentenciaSql->fetch(PDO::FETCH_LAZY);

        
    }

    if (isset($_POST['borrar'])) {
            
        $id = $_GET['id'];
        $sentenciaSQL = $conexion->prepare("SELECT foto FROM mascota WHERE idMascota = '$id';");
        $sentenciaSQL->execute();
        
        if (isset($mascota['foto']) && ($mascota['foto']!="foto.jpg")) {
            if (file_exists("../imagenes/".$mascota['foto'])) {
                unlink("../imagenes/".$mascota['foto']);
            }
        }
        
        
        $sentenciaSql = $conexion->prepare("DELETE FROM mascota WHERE idMascota = '$id';");
        $sentenciaSql->execute();
        
        
        header('Location:gestion_mascotas.php');
        $mensaje;
    }


?>

<h1 class=" container w-75 text-center bg-primary text-white p-2 text-uppercase">Datos Mascota</h1>
<div class="container w-75 bg-light rounded shadow mt-4 ">
    <div class="row col-md-12">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="form-group row mt-3 ">
                        <div class="col-md-12">
                            <h5 class="">Nombre</h5>
                            <p><?php echo $row['nombreM']; ?> </p>
                            <hr>
                        </div>
                    </div>
                    <div class="form-group row mt-3 ">
                        <div class="col-md-12">
                            <h5>Peso</h5>
                            <p><?php echo $row['peso']; ?> Gramos</p>
                            <hr>
                        </div>
                    </div>
                    <div class="form-group row mt-3 ">
                        <div class="col-md-12">
                            <h5>Edad</h5>
                            <p><?php echo $row['edadM']; ?> Meses</p>
                            <hr>
                        </div>
                    </div>
                </div>   
                <div class="col-md-8 rounded text-center">
                        <img src="../imagenes/<?php echo $row['foto'] ;?>" class="rounded mt-3" width="400" height="300" alt="">
                </div>
            </div>
            <div class="form-group row mt-3 text-center">
                <div class="col-md-4">
                    <h5>Sexo</h5>
                    <p><?php echo $row['sexo']; ?></p>
                    <hr>
                </div>
                <div class="col-md-4 ">
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
            <div class="form-group row mt-3 text-center">
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
            <div class="col-md-12 mb-3 text-center">
                <h5>Descripción</h5>
                <p><?php echo $row['descripcion']; ?></p>
                <hr>
            </div>

            <!-- Button trigger modal -->
            <div class="text-center">
                <button type="button" class="btn btn-danger w-25" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Eliminar
                </button>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white ">
                            <h4 class="modal-title" id="exampleModalLabel">Eliminar mascota</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-light">
                            ¿ Está seguro que desea eliminar la mascota ?
                        </div>
                        <div class="modal-footer bg-light">
                            <a class="btn btn-danger" href="gestion_mascotas.php">Cancelar</a>
                            <button type="submit" class="btn btn-success" name="borrar" data-bs-dismiss="modal">Aceptar</button>
                                                
                        </div>
                    </div>
                </div>
            </div>
            </br>
        </form>
    </div>
</div>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>

<?php include('template_donador/footer.php'); ?>