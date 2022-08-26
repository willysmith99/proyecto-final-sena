
<!-- Función para llamar el header -->

<?php include('template_donador/header.php');?>


<?php include ('bd.php'); 

$varsesion = $_SESSION['usuario'];

    if (isset($_GET['id'])) {
        
        $idSolicitud = $_GET['id'];
        $action = $_GET['action'];
        
        // CONDICIÓN PARA ACEPTAR LA SOLICITUD DE LA MASCOTA.
        if ($action == 'aceptar') {
            
            $sentenciaSql = $conexion->prepare("SELECT * FROM solicitud WHERE idSolicitud = '$idSolicitud'; ");
            $sentenciaSql->execute();
            $row = $sentenciaSql->fetch(PDO::FETCH_ASSOC);
            $idRegistro = $row['idRegistro'];

            
            $sentenciaSql = $conexion->prepare("UPDATE solicitud SET proceso = 'Adoptada' WHERE idSolicitud = '$idSolicitud';");
            $sentenciaSql->execute();

            $sentenciaSql = $conexion->prepare("UPDATE registro SET tipo = 'Adoptada' WHERE idRegistro = '$idRegistro';");
            $sentenciaSql->execute();

            header('Location: ver_registro.php');

        }

        // CONDICIÓN PARA RECHAZAR LA SOLICITUD.
        if ($action == 'rechazar') {

            $sentenciaSql = $conexion->prepare("DELETE FROM solicitud WHERE idSolicitud = '$idSolicitud'; ");
            $sentenciaSql->execute();
            header('Location: ver_registro.php');

        }

    }