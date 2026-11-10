<?php
    require "../../autoload.php";

    $reserva = new Reserva();

    $reserva->setData_reserva($_POST['data_reserva']);
    $reserva->setEntrada($_POST['entrada']);
    $reserva->setSaida($_POST['saida']);
    $reserva->setId($_POST['id']);

    $usuarios = new Usuarios();
    $usuarios->setId($_POST['usuarios_id_usuarios']);

    $reserva->setUsuarios($usuarios);

    $dao = new ReservaDAO();
    $dao->update($reserva);

    header('Location: index.php');
?>