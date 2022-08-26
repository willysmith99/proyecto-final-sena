<!-- Función para llamar el header -->

<?php include('template_inicio/header.php');?>

<!-- Contenedor de inicio -->

<div class="container w-100 bg-light rounded shadow p-3 ">

    <div class="row align-items-stretch">

        <!-- Columna con imagen -->

        <div class="col bg d-none d-lg-block rounded">
            <img src="img/perrodibujo.png"
                class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        </div>

        <!-- Columna con botón de ingres y de registro -->

        <div class="col bg d-none d-lg-block rounded" align="center">
            <h1>PRISMA PET</h1>
            <p class="lead">Un lugar para conectar con tu próximo mejor amigo</p>
            </br>
            <img src="img/paws.png"
                class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""
                width="200" height="200">
            <br></br>
            <div class="d-grid gap-2">
                <a href="login.php" class="btn btn-primary d-grid">Ingresar</a>
                Si ya tienes una cuenta en nuestra plataforma web ingresar para donar o adoptar una mascota
                <br></br>
                <a href="registro_usuario.php" class="btn btn-primary d-grid">Registrarse</a>
                Si aún no tienes una cuenta, regístrate aquí para comenzar con todos nuestros servicios
            </div>
        </div>
    </div>
</div>



<!-- Función para llamar el footer -->

<?php include('template_inicio/footer.php');?>