<?php
include_once('templates/header.php');
?>

    <h1 class="mt-5 p-5 text-center font-bold text-4xl">Minha Agenda</h1>
    <?php if(count($contacts) > 0): ?>
        <div class="container min-w-full m-auto p-4 flex justify-center">
        <table class="table-dark table-auto">
            <thead class="bg-gray-700 text-white">
            <tr>
            <th class="px-24 py-2">#</th>
            <th class="px-24 py-2">Nome</th>
            <th class="px-24 py-2">Telefone</th>
            <th class="px-24 py-2"></th>
            </tr>
        </thead>
            <tbody class="bg-red-400 text-gray-700">
                <?php foreach($contacts as $contact): ?>
                    <tr class="transition-all duration-100">
                        <td class="px-24 py-2 font-extrabold"><?= $contact['id'] ?></td>
                        <td class="px-24 py-2"><?= $contact['name'] ?></td>
                        <td class="px-24 py-2" ><?= $contact['phone'] ?></td>
                        <td class="px-24 py-2">
                            <a href="<?= $BASE_URL?>show.php?id=<?= $contact['id'] ?>" class="p-2 m-2 rounded-full bg-green-600 uppercase text-white">Descrição</a>
                            <a href="<?= $BASE_URL?>edit.php?id=<?= $contact['id'] ?>" class="p-2 m-2 rounded-full bg-blue-900 uppercase text-white">Editar</a>
                            <form class="block" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                              <input type="hidden" name="type" value="delete">
                              <input type="hidden" name="id" value="<?= $contact["id"]?>">
                              <button type="submit" class="p-2 m-2 rounded-full bg-red-900 uppercase text-white">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <p>Ainda não há contatos na sua agenda</p>
    <?php endif; ?>

<?php
include_once('templates/footer.php');
?>