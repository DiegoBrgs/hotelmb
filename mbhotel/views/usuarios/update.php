<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe cliente (bean)
    $usuarios = new Usuarios();

    // Definir os valores dos atributos a partir dos dados do form
    $usuarios->setNome($_POST['nome']);
    $usuarios->setCpf($_POST['cpf']);
    $usuarios->setEmail($_POST['email']);
    $usuarios->setSenha($_POST['senha']);
    $usuarios->setId($_POST['id']);

    // Instanciar um objeto da classe ClienteDAO
    $dao = new UsuariosDAO();

    // Invocar o método update da classe ClienteDAO
    $dao->update($usuarios);
    
    // Redirecionar para o index
    header('Location: index.php');