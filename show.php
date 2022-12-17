<?php
include_once('templates/header.php');
?>

   <div class="container flex flex-col justify-center min-w-screen">
      <?php include_once('templates/backbtn.html')?>
    <h1 class="mt-5 p-5 text-center font-bold text-4xl"> <?= $contact['name']?> </h1>
    <p class="font-bold text-2xl ml-44">Telefone: </p>
    <p class=" ml-44 font-semibold text-xl underline "><?= $contact['phone']?></p>
    <p class="font-bold text-2xl ml-44">Observações: </p>
    <p class="  ml-44 font-semibold text-xl underline"><?= $contact['observations']?></p>
   </div>

<?php
include_once('templates/footer.php');
?>