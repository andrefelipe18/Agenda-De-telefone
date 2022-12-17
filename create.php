<?php
  include_once('templates/header.php');
?>
 
 <?php include_once('templates/backbtn.html')?>
    <!-- form - start -->
    <form class="fform" action="<?= $BASE_URL?>/config/process.php" method="POST">
    <input type="hidden" placeholder="Digite o nome" name="type" value="create">
    <div>
    <label for="name" class="llbaelEditCreate">Nome</label>
    <input name="name" placeholder="Digite o telefone" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" required/>
    </div>
    <div>
     <label for="phone" class="llbaelEditCreate">Telefone</label>
     <input name="phone" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" required />
    </div>
    <div class="sm:col-span-2">
        <label for="observation " class="llbaelEditCreate">Observações</label>
        <textarea type="text" id="observations" name="observations" placeholder="Insira as observações" class="w-full h-28 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"></textarea>
    </div>
    <div class="sm:col-span-2 flex justify-between items-center">
        <button type="submit" class="inline-block bg-green-500 hover:bg-green-600 active:bg-green-700 focus-visible:ring ring-green-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Criar</button>
      </div>
    </form>


<?php
  include_once('templates/footer.php');
?>