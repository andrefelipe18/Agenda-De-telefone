<?php

$host = "localhost"; // endereço do servidor
$dbname = "agenda"; // nome do banco de dados
$user = "root"; // usuário do banco de dados
$pass = ""; // senha do banco de dados

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass); //Conectando ao banco de dados

    //Ativando modo de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ativando modo de erros
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage(); //Mostra o erro
}