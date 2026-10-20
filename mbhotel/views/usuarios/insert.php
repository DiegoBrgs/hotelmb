<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $usuarios = New Usuarios ();

    // Definir os valores dos atributos a partir do form
    $usuarios->setNome($_POST['nome']);
    $usuarios->setCpf($_POST['cpf']);
    $usuarios->setEmail($_POST['email']);
    $usuarios->setSenha($_POST['senha']);

    // Instanciar um objeto da Classe ClienteDAO
    $dao = new UsuariosDAO ();

    // Invocar o método create
    $dao->create($usuarios);

    // Redirecionar para o index (comentar caso nao funcione)
    header('Location: index.php');


