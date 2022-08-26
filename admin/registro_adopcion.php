<!-- Función para llamar el header -->

<?php include('template_admin/header.php'); ?>

<?php 

include('bd.php');

//Consulta para ver el registro de adopciones.
$consultSql = $conexion->prepare("SELECT solicitud.fecha, solicitud.proceso, solicitud.idSolicitud, solicitud.idAdoptante, mascota.nombreM, mascota.especie, 
                                    mascota.raza, mascota.foto, registro.idRegistro
                                FROM usuario
                                INNER JOIN registro ON registro.idUsuario = Usuario.idUsuario
                                INNER JOIN solicitud ON registro.idRegistro = solicitud.idRegistro
                                INNER JOIN mascota ON registro.idMascota = mascota.idMascota
                                WHERE solicitud.proceso = 'Adopción'; ");
$consultSql->execute();
$listaAdop = $consultSql->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container">
    <div class="row">
        <h2 class=" text-center mb-3 text-uppercase">Reportes solicitud de adopciones</h2>
        <table class="table border-primary text-center">
            <thead class="table table-primary">
                <tr>
                    <th scope="col">FECHA</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">MASCOTA</th>
                    <th scope="col">ESPECIE</th>
                    <th scope="col">RAZA</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">VER ADOPTANTE</th>
                </tr>
            </thead>

            <?php foreach ($listaAdop as $adop) : ?>
                <tbody class="text-center">
                    <tr>
                        <td class="align-middle"> <?php echo $adop['fecha'] ?> </td>
                        <td class="align-middle"> <?php echo $adop['proceso'] ?> </td>
                        <td class="align-middle"> <?php echo $adop['nombreM'] ?> </td>
                        <td class="align-middle text-center"> <?php echo $adop['especie'] ?> </td>
                    <td class="align-middle text-center"> <?php echo $adop['raza'] ?> </td>
                    <td class="align-middle text-center">
                        <img src="../imagenes/<?php echo $adop['foto'] ?>" class="rounded" width="100" height="100" alt="">
                    </td>
                        <td><a class="btn btn-info mt-4" href="verAdoptante.php?action=vermas&id=<?php echo $adop['idSolicitud']; ?>">Ver Más</a></td>
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
<!-- Función para llamar el footer -->

<?php include('template_admin/footer.php'); ?>