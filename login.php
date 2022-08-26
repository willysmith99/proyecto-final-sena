<!-- Función para llamar el header -->

<?php include('template_inicio/header.php');?>
<style>
.bg {
    background-image: url(img/perrogato.jpg);
    background-position: center center;
}
</style>

<div class="container w-100 bg-light rounded shadow">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block rounded">
        </div>
        
        <div class="col bg-white p-5 rounded-end">
            <div class="text-end">
                <img src="img/paws.png" width="48"></img>
            </div>
            <h2 class="fw-bold text-center py-5">Bienvenido</h2>
            <form action="validar_login.php" method="post">
                <?php if(isset($mensaje)){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje;?>
                </div>
                <?php } ?>
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="email"></input>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password"></input>
                </div>
                <!-- <div class="mb-4 form-check">
                    <input type="checkbox" name="connected" class="form-check-input"></input>
                    <label for="connected" class="form-check-label">Recordar contraseña</label>
                </div> -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" value="ingresar">Iniciar sesión</button>
                </div>
                <div class="my-3">
                    <span>¿No tienes una cuenta?&nbsp;<a href="registro_usuario.php"
                            target="_blank">Regístrate</a></span>
                    <br></br>
                    <span><a href="recuperar_contraseña.php" target="_blank">Recuperar contraseña</a></span>
                </div>
            </form>
            <div class="container w-100">
                <div class="row">
                    <div class="col-12 text-center">Nuestras Redes</div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="https://www.facebook.com/profile.php?id=100075416077298" target="_blank" class="btn btn-outline-primary w-100 my-1">
                            <div class="row align-items-center">
                                <div class="col-2 d-none d-md-block">
                                    <img src="img/facebookc.png.png" width="32"></img> 
                                </div>
                                <div class="col-12 col-md-10 text-center">
                                    Facebook
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="https://instagram.com/prisma_pet?utm_medium=copy_link" target="_blank" class="btn btn-outline-primary w-100 my-1">
                            <div class="row align-items-center">
                                <div class="col-2 d-none d-md-block">
                                    <img src="img/instagramc.png" width="32"></img>
                                </div>
                                <div class="col-12 col-md-10 text-center">
                                    Instagram
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Función para llamar el footer -->

<?php include('template_inicio/footer.php');?>