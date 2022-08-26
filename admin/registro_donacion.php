<!-- Función para llamar el header -->

<?php include('template_admin/header.php');?>


<?php include ('bd.php'); 

    // Consulta para ver el registro de donaciones realizadas
    $sentenciaSql = $conexion->prepare("SELECT registro.fecha, registro.idRegistro, registro.tipo, mascota.idMascota, nombreM, especie, raza, foto
                                FROM usuario
                                INNER JOIN registro ON registro.idusuario = usuario.idUsuario
                                INNER JOIN mascota ON mascota.idMascota = registro.idMascota
                                WHERE registro.tipo = 'Donación'; ");
    
    $sentenciaSql->execute();
    $listaRegistro = $sentenciaSql->fetchAll(PDO::FETCH_ASSOC);


    

?>


<div class="container">
    <div class="row">
        <h2 class="text-center mb-3 text-uppercase">Reportes donaciones realizadas</h2>
        <table class="table border-primary">
            <thead class="table table-primary">
                <tr class="text-center">
                    <th scope="col">FECHA</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">MASCOTA</th>
                    <th scope="col">ESPECIE</th>
                    <th scope="col">RAZA</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">VER DONADOR</th>
                </tr>
            </thead>

        <?php foreach($listaRegistro as $registro): ?>
            <tbody class="text-center">
                <tr>
                    <td class="align-middle text-center"> <?php echo $registro['fecha'] ?> </td>
                    <td class="align-middle text-center"> <?php echo $registro['tipo'] ?> </td>
                    <td class="align-middle text-center"> <?php echo $registro['nombreM'] ?> </td>
                    <td class="align-middle text-center"> <?php echo $registro['especie'] ?> </td>
                    <td class="align-middle text-center"> <?php echo $registro['raza'] ?> </td>
                    <td class="align-middle text-center">
                        <img src="../imagenes/<?php echo $registro['foto'] ?>" class="rounded" width="100" height="100" alt="">
                    </td>
                    <td>
                        <a class="btn btn-info mt-4" href="verDonador.php?action=vermas&id=<?php echo $registro['idRegistro']; ?>">Ver Más</a>
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

<?php include('template_admin/footer.php');?>