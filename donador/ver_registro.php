<!-- Función para llamar el header -->

<?php include('template_donador/header.php');?>


<?php include ('bd.php'); 

    $varsesion = $_SESSION['usuario'];
    // Consulta para ver el registro de donaciones realizadas
    $sentenciaSql = $conexion->prepare("SELECT registro.fecha, registro.tipo, nombreM, especie, raza, foto
                                FROM usuario
                                INNER JOIN registro ON registro.idusuario = usuario.idUsuario
                                INNER JOIN mascota ON mascota.idMascota = registro.idMascota
                                WHERE registro.tipo = 'Donación' and usuario.correo = '$varsesion'; ");
    $sentenciaSql->execute();
    $listaRegistro = $sentenciaSql->fetchAll(PDO::FETCH_ASSOC);



    // // Se consultará el id de la mascota registrada en la sesion y se capturará para buscarlo en la 
    // // tabla registro
    // $sentenciaSql = $conexion->prepare("SELECT mascota.idMascota, mascota.nombreM, mascota.peso, mascota.edadM, 
    //                                     mascota.sexo, mascota.estadoSalud, mascota.tamaño,
    //                                     mascota.especie, mascota.raza, mascota.descripcion, mascota.foto                        
    //                                     FROM usuario
    //                                     INNER JOIN registro ON registro.idUsuario = usuario.idUsuario
    //                                     INNER JOIN mascota ON mascota.idMascota = registro.idMascota
    //                                     WHERE registro.tipo = 'Donación' AND correo = '$varsesion'; ");
    // $sentenciaSql->execute();
    // $listaMasc = $sentenciaSql->fetchAll(PDO::FETCH_ASSOC);

    //
    
    $sentenciaSQL = $conexion->prepare("SELECT * FROM usuario WHERE correo = '$varsesion'; ");
    $sentenciaSQL->execute();
    $row = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
    $idUsuario = $row['idUsuario'];


    //Consulta para ver el registro de adopciones solicitadas.
        $consultSql = $conexion->prepare("SELECT solicitud.fecha, solicitud.proceso, mascota.nombreM, usuario.nombre, 
                                            telefono, correo, registro.idRegistro, solicitud.idSolicitud
                                        FROM usuario
                                        INNER JOIN registro ON registro.idUsuario = Usuario.idUsuario
                                        INNER JOIN solicitud ON registro.idRegistro = solicitud.idRegistro
                                        INNER JOIN mascota ON registro.idMascota = mascota.idMascota
                                        WHERE solicitud.proceso = 'Adopción' AND solicitud.idDonante = '$idUsuario';");
        $consultSql->execute();
        $listaAdop = $consultSql->fetchAll(PDO::FETCH_ASSOC);

 

     

?>




<div class="container">
    <div class="row">
    <h2 class="fw-bold text-center mb-3 text-uppercase">Reportes donaciones realizadas</h2>
        <table class="table border-primary text-center">
            <thead class="table table-primary">
                <tr>
                    <th scope="col">FECHA</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">MASCOTA</th>
                    <th scope="col">ESPECIE</th>
                    <th scope="col">RAZA</th>
                    <th scope="col">FOTO</th>
                </tr>
            </thead>

        <?php foreach($listaRegistro as $registro): ?>
            <tbody>
                <tr>
                    <td class="align-middle"> <?php echo $registro['fecha'] ?> </td>
                    <td class="align-middle"> <?php echo $registro['tipo'] ?> </td>
                    <td class="align-middle"> <?php echo $registro['nombreM'] ?> </td>
                    <td class="align-middle"> <?php echo $registro['especie'] ?> </td>
                    <td class="align-middle"> <?php echo $registro['raza'] ?> </td>
                    <td class="align-middle">
                        <img src="../imagenes/<?php echo $registro['foto'] ?>" class="rounded" width="100" height="100" alt="">
                    </td>
                </tr>
            </tbody>
        <?php endforeach ?>

        </table>
    </div>
</div>



<div class="container mt-5">
    <div class="row">
    <h2 class="fw-bold text-center mb-3 text-uppercase">Reportes solicitud de adopciones</h2>
        <table class="table border-primary text-center">
            <thead class="table table-primary">
                <tr>
                    <th scope="col">FECHA</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">MASCOTA</th>
                    <th scope="col">ADOPTANTE</th>
                </tr>
            </thead>

        <?php foreach($listaAdop as $adop): ?>   
            <tbody>
                <tr>
                
                    <td class="align-middle"> <?php echo $adop['fecha'] ?> </td>
                    <td class="align-middle"> <?php echo $adop['proceso'] ?> </td>
                    <td class="align-middle"> <?php echo $adop['nombreM'] ?> </td>
                    <td class="align-middle">
                        
                        <a class="btn btn-info" href="verAdoptante.php?action=vermas&id=<?php echo $adop['idSolicitud']; ?>">Ver Más</a>
                        
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
<!-- Función para llamar el footer -->

<?php include('template_donador/footer.php');?>