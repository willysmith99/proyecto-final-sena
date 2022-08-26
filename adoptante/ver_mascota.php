<?php include('template_adoptante/header.php'); ?>


<?php


    $conexion = new PDO("mysql:host=localhost;dbname=prismapet", "root", "");

    $sentenciaSQL = $conexion->prepare("SELECT mascota.idMascota, nombreM, especie, raza, foto, registro.tipo
                                        FROM usuario
                                        INNER JOIN registro ON registro.idUsuario = usuario.idUsuario
                                        INNER JOIN mascota ON mascota.idMascota = registro.idMascota
                                        WHERE registro.tipo='Donación'; ");
    $sentenciaSQL->execute();
    $listaMascotas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<h1 class=" contenedor text-center bg-primary text-white p-2 mb-3 text-uppercase">Mascotas Disponibles</h1>
<div class="container bg-light border rounded-3">
    <div class="row col-md-12">
        <?php foreach ($listaMascotas as $mascota): ?>
            <div class="col-md-3">
                <div class="card ">
                    <figure>
                        <img src="../imagenes/<?php echo $mascota["foto"]; ?>" alt="">
                    </figure>
                    <div class="contenido">
                        <h3 class="text-capitalize"><?php echo $mascota['nombreM']; ?></h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item flex sepa">
                                <p class="text-uppercase">Especie</p>
                                <p class="text-capitalize"><?php echo $mascota['especie'] ; ?></p>
                            </li>
                            <li class="list-group-item flex sepa">
                                <p class="text-uppercase">Raza</p>
                                <p class="text-capitalize"><?php echo $mascota['raza'] ; ?></p>  
                            </li>
                            <!-- <li class="list-group-item flex sepa">
                                <p class="text-capitalize"> <?php echo $mascota['tipo']; ?> </p>
                            </li> -->
                        </ul>
                        <a class="mx-3" href="mascota.php?id=<?php echo $mascota["idMascota"]?>">Ver Más</a>
                        <a href="formulario_adopcion.php?id=<?php echo $mascota["idMascota"]?>">Adoptar</a>
                    </div>
                </div> 
            </div>    
        <?php endforeach; ?>   
    </div>    
</div>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>


<?php include('template_adoptante/footer.php'); ?>