<?php

  session_start(); // inicia a sessão

  include_once("connection.php"); // pega a conexão com o banco de dados
  include_once("url.php"); // pega a url base

  $data = $_POST; // pega os dados do formulário

  // MODIFICAÇÕES NO BANCO
  if(!empty($data)) { // se o array não estiver vazio

    // Criar contato
    if($data["type"] === "create") { // se o tipo for create

      $name = $data["name"]; // pega o nome
      $phone = $data["phone"]; // pega o telefone
      $observations = $data["observations"]; // pega as observações

      $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)"; // query de 
      //inserção

      $stmt = $conn->prepare($query); // prepara a query

      $stmt->bindParam(":name", $name); // associa o nome
      $stmt->bindParam(":phone", $phone); // associa o telefone
      $stmt->bindParam(":observations", $observations); // associa as observações

      try {

        $stmt->execute(); // executa a query
        $_SESSION["msg"] = "Contato criado com sucesso!"; // mensagem de sucesso
    
      } catch(PDOException $e) { // se der erro
        // erro na conexão
        $error = $e->getMessage(); // pega a mensagem de erro
        echo "Erro: $error"; // mostra a mensagem de erro
      }

    } else if($data["type"] === "edit") { // se o tipo for edit
 
      $name = $data["name"]; // pega o nome
      $phone = $data["phone"]; // pega o telefone
      $observations = $data["observation"]; // pega as observações
      $id = $data["id"]; // pega o id

      $query = "UPDATE contacts 
                SET name = :name, phone = :phone, observations = :observations 
                WHERE id = :id"; // query de atualização 

      $stmt = $conn->prepare($query); // prepara a query

      $stmt->bindParam(":name", $name); // associa o nome
      $stmt->bindParam(":phone", $phone); // associa o telefone
      $stmt->bindParam(":observation", $observations); // associa as observações
      $stmt->bindParam(":id", $id); // associa o id

      try {

        $stmt->execute(); // executa a query
        $_SESSION["msg"] = "Contato atualizado com sucesso!"; // mensagem de sucesso
    
      } catch(PDOException $e) { // se der erro
        // erro na conexão 
        $error = $e->getMessage(); // pega a mensagem de erro
        echo "Erro: $error"; // mostra a mensagem de erro
      }

    } else if($data["type"] === "delete") { // se o tipo for delete

      $id = $data["id"]; // pega o id

      $query = "DELETE FROM contacts WHERE id = :id";   // query de remoção

      $stmt = $conn->prepare($query); // prepara a query

      $stmt->bindParam(":id", $id); // associa o id
      
      try {

        $stmt->execute(); // executa a query
        $_SESSION["msg"] = "Contato removido com sucesso!"; // mensagem de sucesso
    
      } catch(PDOException $e) { // se der erro
        // erro na conexão
        $error = $e->getMessage(); // pega a mensagem de erro
        echo "Erro: $error"; // mostra a mensagem de erro
      }

    }

    // Redirect HOME
    header("Location:" . $BASE_URL . "../index.php"); // redireciona para a página inicial

  // SELEÇÃO DE DADOS
  } else { // se o array estiver vazio
     
    $id; // id do contato

    if(!empty($_GET)) { // se o array não estiver vazio
      $id = $_GET["id"]; // pega o id
    }

    // Retorna o dado de um contato
    if(!empty($id)) { // se o id não estiver vazio

      $query = "SELECT * FROM contacts WHERE id = :id"; // query de seleção

      $stmt = $conn->prepare($query); // prepara a query

      $stmt->bindParam(":id", $id); // associa o id

      $stmt->execute(); // executa a query
 
      $contact = $stmt->fetch(); // pega o contato

    } else { // se o id estiver vazio

      // Retorna todos os contatos
      $contacts = []; // array de contatos

      $query = "SELECT * FROM contacts"; // query de seleção

      $stmt = $conn->prepare($query);   // prepara a query

      $stmt->execute(); // executa a query
      
      $contacts = $stmt->fetchAll(); // pega todos os contatos

    }

  }

  // FECHAR CONEXÃO
  $conn = null; // fecha a conexão