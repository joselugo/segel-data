 <!-- Main content -->
 <section class="container" style="margin-top: 20px;">
   <!-- Small boxes (Stat box) -->
   <!-- <div class="jumbotron mx-center" style="padding:20px">
     <h1>Feliz Cumpleaños</h1>
     <p class="lead">Felicidades <?= $cumpleanios; ?></p>
   </div> -->

   <div class="jumbotron mx-center" style="padding:20px">
     <h1>Feliz Cumpleaños <?= $cumpleanios; ?></h1>
     <p class="lead"> A NOMBRE DE NUESTRA GRAN FAMILIA NETIUM QUEREMOS DESEARTE UN FELIZ CUMPLEAÑOS 🎂🎁! </p>
     <!--  <p class="lead">Felicidades <?= $cumpleanios; ?></p> -->
   </div>

   <!--  <div class="jumbotron mx-center" style="padding:20px">
     <h1>Feliz Noche Buena y Feliz Navidad</h1>
     <p class="lead">Eres lo más valioso para nosotros. ¡Esperamos contar contigo durante muchas Navidades más! ¡Felices Fiestas! </p>
   </div> -->

   <!-- /.row -->
 </section>
 <script>
   confetti.start(10000);
   setInterval(function() {
     confetti.stop();
   }, 25000);
 </script>