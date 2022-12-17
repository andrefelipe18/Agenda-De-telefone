<?php
include_once('templates/header.php');
?>

   <div class="container flex flex-col justify-center min-w-screen">
      <?php include_once('templates/backbtn.html')?>
    <h1 class="mt-5 p-5 text-center font-bold text-4xl"> <?= $contact['name']?> </h1>
   </div>
    <form class="fform" action="<?= $BASE_URL?>/config/process.php" method="POST">
    <input type="hidden" name="type" value="edit">
    <input type="hidden" name="id" value="<?= $contact['id']?>">
    <div>
    <label for="name" class="llbaelEditCreate">Alterar Nome</label>
    <input name="name" placeholder="<?= $contact['name']?>" class="iinput" value="<?= $contact['name']?>" required />
    </div>
    <div>
     <label for="phone" class="llbaelEditCreate">Alterar Telefone</label>
     <input name="phone" placeholder="<?= $contact['phone']?>" class="iinput" value="<?= $contact['phone']?>"  required />
    </div>
    <div class="sm:col-span-2">
        <label for="observation" class="llbaelEditCreate">Alterar Observações</label>
        <textarea type="text" id="observations" name="observations" placeholder="<?= $contact['observations']?> " <?= $contact['observations']?> class="w-full h-28 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"></textarea>
    </div>
    <div class="sm:col-span-2 flex justify-between items-center">
        <button type="submit" class="bottaoEdit">Editar</button>
    </div>  
</form>
 
<?php
include_once('templates/footer.php');
?>