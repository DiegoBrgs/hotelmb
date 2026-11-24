<?php
    require "../../autoload.php";

    $quarto = new Quarto();

    $quarto->setNumero($_POST['numero']);
    $quarto->setAndar($_POST['andar']);
    $quarto->setStatus_quarto($_POST['status_quarto']);
    $quarto->setId($_POST['id']);

    $hotel = new Hotel();
    $hotel->setId($_POST['hotel_id_hotel']);

    $quarto->setHotel($hotel);

    $dao = new quartoDAO();
    $dao->update($quarto);

    header('Location: index.php');
?>