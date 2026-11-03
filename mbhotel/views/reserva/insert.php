<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe reserva (bean)
    $reserva = new Reserva ();

    // Definir os valores dos atributos a partir do form
    $reserva->setData_reserva($_POST['data_reserva']);
    $reserva->setEntrada($_POST['entrada']);
    $reserva->setSaida($_POST['saida']);

    // Instanciar um objeto da Categoria
    $usuarios = new Usuarios();
    $usuarios->setId($_POST['usuarios_id_usuarios']);

    // Definir a categoria do filme
    $reserva->setUsuarios($usuarios);

    // Instanciar um objeto da Classe reservaDAO
    $dao = new ReservaDAO ();

    // Invocar o método create
    $dao->create($reserva);

    // Redirecionar para o index (comentar caso nao funcione)
   header('Location: index.php');


