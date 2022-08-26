
<?php include('template_admin/header.php');?>

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
        
        
        header('Location:registro_donacion.php');
        $mensaje;
    }


?>


<div class="container w-75 bg-light rounded shadow mt-4 ">
    <div class="row col-md-12 text-center">
        <h2 class=" text-center mb-3 text-capitalize mt-2 mb-4">Datos Mascota</h2>
        <div class="form-group row mt-3 ">
            <form action="" method="POST">
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

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Eliminar
            </button>

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
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger" name="borrar" data-bs-dismiss="modal">Aceptar</button>
                                                
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('template_admin/footer.php');?>