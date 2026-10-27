<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe hotel (bean)
    $hotel = new Hotel();

    // Definir os valores dos atributos a partir dos dados do form
    $hotel->setNome($_POST['nome']);
    $hotel->setCnpj($_POST['cnpj']);
    $hotel->setTelefone($_POST['telefone']);
    $hotel->setEmail($_POST['email']);
    $hotel->setEndereco($_POST['endereco']);
    $hotel->setId($_POST['id']);

    // Instanciar um objeto da classe HotelDAO
    $dao = new HotelDAO();

    // Invocar o método update da classe HotelDAO
    $dao->update($hotel);
    
    // Redirecionar para o index
    header('Location: index.php');