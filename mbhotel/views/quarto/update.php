<?php
    require "../../autoload.php";

    $quarto = new Quarto();

    $quarto->setNome($_POST['nome']);
    $quarto->setCpf($_POST['cpf']);
    $quarto->setTelefone($_POST['telefone']);
    $quarto->setCargo($_POST['cargo']);
    $quarto->setId($_POST['id']);

    $hotel = new Hotel();
    $hotel->setId($_POST['hotel_id_hotel']);

    $quarto->setHotel($hotel);

    $dao = new quartoDAO();
    $dao->update($quarto);

    header('Location: index.php');
?>