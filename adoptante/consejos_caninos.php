<!-- Función para llamar el header -->

<?php include('template_adoptante/header.php');?>

<style>
.bgC {
    background-image: url(../img/perro1.jpg);
    background-position: center center;
}
</style>

<h1 class=" container text-center bg-primary mb-3 text-white p-2 text-uppercase">Canino</h1>
<div class="container bg-light rounded shadow text-justify">
    <div class="row align-items-stretch">
        <div class="col bgC d-none d-lg-block rounded">

        </div>
        <div class="col bg-white p-1 rounded-end">
          
            <ul>
                <li class="me-3 mb-2"> 
                  Acaricia a tu perro: <br> Un trato amoroso es muy aconsejable para la salud de tu mascota, tómate algún momento del día para compartir con tu perro y consigue un tiempo de calidad. Aprovecha para acariciarlo, abrazarlo o
                  darle un masaje relajante en patas y muslos.
                </li>
                <li class="me-3 mb-2">
                  Hacer ejercicio: <br> Emplea unos minutos de tu día para jugar con él, ya sea lanzando una pelota o darle un
                  largo paseo por el parque.
                </li>
                <li class="me-3 mb-2">
                  Educa a tu perro: <br> En la educación de la mascota se debe incluir: horarios de comidas, de salidas, espacios
                  donde puede dormir, elementos con los que puede jugar, el lugar donde hacer sus necesidades, etc. Que
                  aprenda todas estas cosas garantiza una buena adaptación del perro al hogar.
                </li>
                <li class="me-3 mb-2">
                  Premia su buen comportamiento: <br> Cuanto tu perro haga algo que le pediste o responda a cierto tipo de
                  entrenamiento, felicítalo y premialo ya sea con golosinas, caricias o juguetes.
                </li>
                <li class="me-3 mb-2">
                  Visitas al veterinario: <br> Dentro de los cuidados que necesita un animal son importantes las visitas regulares
                  al veterinario donde le pongan las vacunas y el chip obligatorio.
                </li>
                <li class="me-3 mb-2">
                  Alimentación: <br> Es importante que los perros sigan una buena alimentación. Hablar con el veterinario nos
                  ayudará a saber los nutrientes necesarios para nuestra mascota según su raza, condición física y peso.
                </li>
                <li class="me-3 mb-2">
                  Higiene del animal: <br> Es importante mantener la higiene de la mascota al día: orejas, boca y pelo.
                </li>
            </ul>
        </div>
    </div>
</div>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-1051441-Z4BO31PIT14MWLXL/index.json',
  });
</script>
<!-- Función para llamar el footer -->

<?php include('template_adoptante/footer.php');?>