<!-- Función para llamar el header -->

<?php include('template_donador/header.php'); ?>

<!-- Función para llamar a la conexión de la bd -->
<?php include('bd.php');

$varsesion = $_SESSION['usuario'];

$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE correo = '$varsesion'; ");
$sentencia->execute();
$row = $sentencia->fetch(PDO::FETCH_ASSOC);
$_SESSION['idUsuario'] = $row['idUsuario'];







$sentenciaSql = $conexion->prepare("SELECT mascota.idMascota, mascota.nombreM, mascota.peso, mascota.edadM, 
                                        mascota.sexo, mascota.estadoSalud, mascota.tamaño, 
                                        mascota.especie, mascota.raza, mascota.descripcion, mascota.foto                        
                                        FROM usuario
                                        INNER JOIN registro ON registro.idUsuario = usuario.idUsuario
                                        INNER JOIN mascota ON mascota.idMascota = registro.idMascota
                                        WHERE registro.tipo ='Donación' AND correo = '$varsesion'; ");


$sentenciaSql->execute();
$listaMasc = $sentenciaSql->fetchAll(PDO::FETCH_ASSOC);


?>


<?php if (isset($mensaje)) { ?>

    <div class="alert alert-danger mt-2" role="alert">

        <?php echo $mensaje; ?>
    </div>
<?php } ?>

<div class="container">
    <div class="row">
        <h2 class="fw-bold text-center mb-3">Mascotas Registradas</h2>
        <table class="table border-primary">
            <thead class="table table-primary">
                <tr class="text-center">
                    <th scope="col">NOMBRE</th>
                    <th scope="col">PESO</th>
                    <th scope="col">EDAD</th>
                    <th scope="col">SEXO</th>
                    <th scope="col">SALUD</th>
                    <th scope="col">TAMAÑO</th>
                    <th scope="col">ESPECIE</th>
                    <th scope="col">RAZA</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>

            <?php foreach ($listaMasc as $masc) : ?>
                <tbody>
                    <tr>

                        <td class="align-middle text-center"> <?php echo $masc['nombreM']; ?> </td>
                        <td class="align-middle text-center"> <?php echo $masc['peso']; ?> Gramos </td>
                        <td class="align-middle text-center"> <?php echo $masc['edadM']; ?> Meses </td>
                        <td class="align-middle text-center"> <?php echo $masc['sexo']; ?> </td>
                        <td class="align-middle text-center"> <?php echo $masc['estadoSalud']; ?> </td>
                        <td class="align-middle text-center"> <?php echo $masc['tamaño']; ?> </td>
                        <td class="align-middle text-center"> <?php echo $masc['especie']; ?> </td>
                        <td class="align-middle text-center"> <?php echo $masc['raza']; ?> </td>
                        <td class="align-middle text-center"> <?php echo $masc['descripcion']; ?> </td>
                        <td class="">
                            <img src="../imagenes/<?php echo $masc['foto'] ?>" class="rounded" width="100" height="100" alt="">
                        </td>

                        <td>
                            <div class="btn-group"  role="group">

                                <a class="btn btn-danger" href="eliminar_mascota.php?id=<?php echo $masc['idMascota']; ?>">Eliminar</a>
                                &nbsp;
                                <a class="btn btn-info " href="actualizar_mascota.php?id=<?php echo $masc['idMascota']; ?>">Modificar</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            
                <?php endforeach ?>

        </table>
    </div>
</div>


<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
    var myLandbot = new Landbot.Livechat({
        configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
    });
</script>

<?php include('template_donador/footer.php'); ?>