<!-- Función para llamar el header -->

<?php include('template_adoptante/header.php');?>

<style>
.bg {
    background-image: url(../img/pez1.jpg);
    background-position: center center;
}
</style>

<h1 class=" container text-center bg-primary mb-3 text-white p-2 text-uppercase">Peces</h1>
<div class="container bg-light rounded shadow text-justify">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block rounded">

        </div>
        <div class="col bg-white p-1 rounded-end">

            <ul>
                <li class="me-3 mb-2">
                    Información: <br> antes de nada, acude a un centro veterinario especializado para informarte de los
                    cuidados que requiere esa especie en concreto, y no te lances si no estás seguro de poder cumplir con
                    todo lo necesario.
                </li>
                <li class="me-3 mb-2">
                    Acuario: <br> El tamaño del acuario es tan importante como para nosotros el de nuestra cama. Busca
                    acuarios adecuados para las especies que quieres tener. Recuerda, siempre ir al tamaño más grande que te
                    puedas permitir.
                </li>
                <li class="me-3 mb-2">
                    Agua limpia: <br> A todos nos gusta tener nuestra casa limpia, ¿verdad? Procura mantener el agua de
                    los peces en perfecto estado para que puedan estar cómodos y disfrutar. Además la calidad del agua va a
                    determinar el buen estado de salud del pez.
                </li>
                <li class="me-3 mb-2">
                    Renovación del agua: <br> Se recomienda cambiar el 30% del agua de la pecera un par de veces por
                    semana.
                </li>
                <li class="me-3 mb-2">
                    Bomba de aire y filtro: <br> los peces respiran oxígeno del agua, por lo que es esencial que tengan
                    todo el que necesitan. Infórmate de qué necesita tu pez e instala la bomba necesaria. Dependiendo de
                    especies y tamaño también puede ser que necesites un filtro que depure y oxigene el agua.
                </li>
                <li class="me-3 mb-2">
                    Temperatura: <br> ¿son peces de agua fría o de agua cálida? Tenlo claro y mantenlos a la
                    temperatura adecuada.
                </li>
                <li class="me-3 mb-2">
                    Iluminación: <br> No dejes que estén siempre a oscuras, los peces también necesitan recibir luz y
                    será tu labor proporcionársela. Si vas a tener plantas este punto también es muy relevante.
                </li>
                <li class="me-3 mb-2">
                    Alimentación: <br> Da de comer a tus peces pero tampoco les sobrealimentes. Busca la mejor
                    alimentación para ellos y sigue las recomendaciones en cuanto a cantidades.
                </li>
                <li class="me-3 mb-2">
                    Veterinario: <br> acude a tu clínica veterinaria siempre que sea necesario, resuelve dudas y cuida
                    del animal evitando que enferme.
                </li>

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