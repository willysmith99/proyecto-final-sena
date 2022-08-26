<?php include 'bd.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sentenciaSql = $conexion->prepare("SELECT * FROM mascota WHERE idMascota = '$id'; ");
    $sentenciaSql->execute();
    $mascota = $sentenciaSql->fetch(PDO::FETCH_LAZY);

    $nombreM = $mascota['nombreM'];
    $peso = $mascota['peso'];
    $edadM = $mascota['edadM'];
    $sexo = $mascota['sexo'];
    $estadoSalud = $mascota['estadoSalud'];
    $tamanio = $mascota['tamaño'];
    $especie = $mascota['especie'];
    $raza = $mascota['raza'];
    $descripcion = $mascota['descripcion'];
    $foto = $mascota['foto'];
}

if (isset($_POST['actualizar'])) {

    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $peso = $_POST['peso'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $estadoSalud = $_POST['estado'];
    $tamanio = $_POST['tamanio'];
    $especie = $_POST['especie'];
    $raza = $_POST['raza'];
    $descripcion = $_POST['descripcion'];
    $foto = $_FILES['foto']['name'];

    $sentenciaSql = $conexion->prepare("UPDATE mascota SET nombreM = '$nombre', peso = '$peso',
                                            edadM = '$edad', sexo = '$sexo', estadoSalud = '$estadoSalud',
                                            tamaño = '$tamanio', especie = '$especie', raza = '$raza',
                                            descripcion = '$descripcion'
                                            WHERE idMascota = '$id';");

    $sentenciaSql->execute();

    if ($foto != "") {

        $fecha = new DateTime();
        $nombreFoto = ($foto != "") ? $fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "foto.jpg";
        $tmpFoto = $_FILES["foto"]["tmp_name"];

        move_uploaded_file($tmpFoto, "../imagenes/" . $nombreFoto);

        $sentenciaSql = $conexion->prepare("SELECT foto FROM mascota WHERE idMascota = '$id'; ");
        $sentenciaSql->execute();
        $fotito = $sentenciaSql->fetch(PDO::FETCH_LAZY);

        if (isset($fotito['foto']) && ($fotito['foto'] != 'foto.jpg')) {

            if (file_exists("../imagenes/" . $fotito['foto'])) {

                unlink("../imagenes/" . $fotito['foto']);
            }
        }

        $sentenciaSql = $conexion->prepare("UPDATE mascota SET foto = '$nombreFoto'
                                                WHERE idMascota = '$id'; ");
        $sentenciaSql->execute();
    }

    header('Location:gestion_mascotas.php');
}


if (isset($_POST['cancelar'])) {

    header('Location:gestion_mascotas.php');
}

?>

<!-- Función para llamar el header -->

<?php include('template_donador/header.php'); ?>


<div class="container w-100 bg-light rounded shadow ">
    <div class="row">
        <h1 class=" contenedor text-center bg-primary text-white p-2 text-uppercase">Actualizar mascota</h1>

        <div class="col rounded">
            <?php if ($foto != "") { ?>

                <img src="../imagenes/<?php echo $foto ?>" class="rounded mt-5" width="600" height="700" alt="">

            <?php    } ?>

        </div>
        <div class="col bg-light p-5 rounded-end">
            <form action="actualizar_mascota.php?id=<?php echo $mascota['idMascota']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" id="id" placeholder="ID de la mascota">
                </div>
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                    <input type="text" value="<?php echo $nombreM; ?>" class="form-control" required name="nombre" id="nombre" placeholder="Ingresar nombre">
                </div>
                </br>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="peso" class="form-label">Peso <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $peso; ?>" class="form-control" required name="peso" id="peso" placeholder="Ingresar peso en gramos">
                    </div>
                    <div class="col-md-4">
                        <label for="edad" class="form-label">Edad <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $edadM; ?>" class="form-control" required name="edad" id="edad" placeholder="Ingresar edad en meses">
                    </div>
                    <div class="col-md-4">
                        <label for="sexo" class="form-label">Sexo <span class="text-danger">*</span></label>
                        <select class="form-select" id="sexo" required name="sexo">

                            <option value="" selected>
                                <--Seleccione-->
                            </option>
                            <?php
                            if ($sexo == "M") { ?>

                                <option value="M" selected>Macho</option>
                                <option value="H">Hembra</option>

                            <?php } else { ?>

                                <option value="H" selected>Hembra</option>
                                <option value="M">Macho</option>

                            <?php } ?>

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

                            <?php if ($estadoSalud == "Buena") { ?>
                                <option selected>Buena</option>
                                <option>Regular</option>
                                <option>Mala</option>

                            <?php } elseif ($estadoSalud == "Regular") { ?>

                                <option>Buena</option>
                                <option selected>Regular</option>
                                <option>Mala</option>

                            <?php } else { ?>

                                <option>Buena</option>
                                <option>Regular</option>
                                <option selected>Mala</option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tamanio" class="form-label">Tamaño <span class="text-danger">*</span></label>
                        <select class="form-select" id="tamanio" required name="tamanio">
                            <option value="" selected>
                                <--Seleccione-->
                            </option>

                            <?php if ($tamanio == "Pequeño") { ?>

                                <option selected>Pequeño</option>
                                <option>Mediano</option>
                                <option>Grande</option>

                            <?php } elseif ($tamanio == "Mediano") { ?>

                                <option>Pequeño</option>
                                <option selected>Mediano</option>
                                <option>Grande</option>

                            <?php } else { ?>

                                <option>Pequeño</option>
                                <option>Mediano</option>
                                <option selected>Grande</option>

                            <?php } ?>

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

                            <?php if ($especie == "Ave") { ?>

                                <option selected>Ave</option>
                                <option>Canino</option>
                                <option>Equino</option>
                                <option>Felino</option>
                                <option>Insecto</option>
                                <option>Lagomorfo</option>
                                <option>Pez</option>
                                <option>Reptil</option>
                                <option>Roedor</option>

                            <?php } elseif ($especie == "Canino") { ?>

                                <option>Ave</option>
                                <option selected>Canino</option>
                                <option>Equino</option>
                                <option>Felino</option>
                                <option>Insecto</option>
                                <option>Lagomorfo</option>
                                <option>Pez</option>
                                <option>Reptil</option>
                                <option>Roedor</option>


                            <?php } elseif ($especie == "Equino") { ?>

                                <option>Ave</option>
                                <option>Canino</option>
                                <option selected>Equino</option>
                                <option>Felino</option>
                                <option>Insecto</option>
                                <option>Lagomorfo</option>
                                <option>Pez</option>
                                <option>Reptil</option>
                                <option>Roedor</option>

                            <?php } elseif ($especie == "Felino") { ?>

                                <option>Ave</option>
                                <option>Canino</option>
                                <option>Equino</option>
                                <option selected>Felino</option>
                                <option>Insecto</option>
                                <option>Lagomorfo</option>
                                <option>Pez</option>
                                <option>Reptil</option>
                                <option>Roedor</option>


                            <?php } elseif ($especie == "Insecto") { ?>

                                <option>Ave</option>
                                <option>Canino</option>
                                <option>Equino</option>
                                <option>Felino</option>
                                <option selected>Insecto</option>
                                <option>Lagomorfo</option>
                                <option>Pez</option>
                                <option>Reptil</option>
                                <option>Roedor</option>

                            <?php } elseif ($especie == "Lagomorfo") { ?>

                                <option>Ave</option>
                                <option>Canino</option>
                                <option>Equino</option>
                                <option>Felino</option>
                                <option>Insecto</option>
                                <option selected>Lagomorfo</option>
                                <option>Pez</option>
                                <option>Reptil</option>
                                <option>Roedor</option>

                            <?php } elseif ($especie == "Pez") { ?>

                                <option>Ave</option>
                                <option>Canino</option>
                                <option>Equino</option>
                                <option>Felino</option>
                                <option>Insecto</option>
                                <option>Lagomorfo</option>
                                <option selected>Pez</option>
                                <option>Reptil</option>
                                <option>Roedor</option>

                            <?php } elseif ($especie == "Reptil") { ?>

                                <option>Ave</option>
                                <option>Canino</option>
                                <option>Equino</option>
                                <option>Felino</option>
                                <option>Insecto</option>
                                <option>Lagomorfo</option>
                                <option>Pez</option>
                                <option selected>Reptil</option>
                                <option>Roedor</option>

                            <?php } else { ?>

                                <option>Ave</option>
                                <option>Canino</option>
                                <option>Equino</option>
                                <option>Felino</option>
                                <option>Insecto</option>
                                <option>Lagomorfo</option>
                                <option>Pez</option>
                                <option>Reptil</option>
                                <option selected>Roedor</option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="raza" class="form-label">Raza<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $raza; ?>" class="form-control" required name="raza" id="raza" placeholder="Ingrese la raza de la mascota">
                    </div>
                </div>
                </br>
                <div class="col-md-12">
                    <label for="descripcion" class="form-label">Descripción <span class="text-danger">*</span></label>
                    <textarea class="form-control" value="<?php echo $descripcion; ?>" id="descripcion" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 44px;" name="descripcion"><?php echo $descripcion; ?></textarea>
                </div>
                </br>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="foto" name="foto">
                </div>
                
                <div class="btn-group mt-3 d-flex justify-content-center" role="group">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary fs-5 w-25 d-grid mx-auto mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Actualizar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white ">
                                    <h4 class="modal-title" id="exampleModalLabel">Actualizar mascota</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-light">
                                    ¿ Está seguro que desea actualizar la mascota ?
                                </div>
                                <div class="modal-footer bg-light">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="actualizar" class="btn btn-success">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    <button type="submit" name="cancelar" class="btn btn-danger fs-5 w-25 d-grid mx-auto mt-4">Cancelar</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
    var myLandbot = new Landbot.Livechat({
        configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
    });
</script>
<?php include('template_donador/footer.php'); ?>