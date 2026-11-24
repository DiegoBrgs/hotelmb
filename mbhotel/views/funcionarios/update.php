<?php
    require "../../autoload.php";

    $funcionarios = new Funcionarios();

    $funcionarios->setNome($_POST['nome']);
    $funcionarios->setCpf($_POST['cpf']);
    $funcionarios->setTelefone($_POST['telefone']);
    $funcionarios->setCargo($_POST['cargo']);
    $funcionarios->setId($_POST['id']);

    $hotel = new Hotel();
    $hotel->setId($_POST['hotel_id_hotel']);

    $funcionarios->setHotel($hotel);

    $dao = new FuncionariosDAO();
    $dao->update($funcionarios);

    header('Location: index.php');
?>