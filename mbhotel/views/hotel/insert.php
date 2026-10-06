<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $hotel = New Hotel ();

    // Definir os valores dos atributos a partir do form
    $hotel->setNome($_POST['nome']);
    $hotel->setCnpj($_POST['cnpj']);
    $hotel->setTelefone($_POST['telefone']);
    $hotel->setEmail($_POST['email']);
    $hotel->setEndereco($_POST['endereco']);

    // Instanciar um objeto da Classe ClienteDAO
    $dao = new HotelDAO ();

    // Invocar o método create
    $dao->create($hotel);

    // Redirecionar para o index (comentar caso nao funcione)
    header('Location: index.php');


