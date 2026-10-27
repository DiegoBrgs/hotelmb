<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe funcionarios (bean)
    $funcionarios = new funcionarios ();

    // Definir os valores dos atributos a partir do form
    $funcionarios->setNome($_POST['nome']);
    $funcionarios->setCpf($_POST['cpf']);
    $funcionarios->setTelefone($_POST['telefone']);
    $funcionarios->setCargo($_POST['Cargo']);

    // Instanciar um objeto da Categoria
    $funcionarios = new Hotel();
    $funcionarios->setId($_POST['hotel_id_hotel']);

    // Definir a categoria do filme
    $filme->setHotel($hotel);

    // Instanciar um objeto da Classe funcionariosDAO
    $dao = new funcionariosDAO ();

    // Invocar o método create
    $dao->create($funcionarios);

    // Redirecionar para o index (comentar caso nao funcione)
    header('Location: index.php');


