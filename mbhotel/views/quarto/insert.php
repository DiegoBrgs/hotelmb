<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe quarto (bean)
    $quarto = new Quarto ();

    // Definir os valores dos atributos a partir do form
    $quarto->setNumero($_POST['numero']);
    $quarto->setAndar($_POST['andar']);
    $quarto->setStatus_quarto($_POST['status_quarto']);

    // Instanciar um objeto da Categoria
    $hotel = new Hotel();
    $hotel->setId($_POST['hotel_id_hotel']);

    // Definir a categoria do filme
    $quarto->setHotel($hotel);

    // Instanciar um objeto da Classe quartoDAO
    $dao = new QuartoDAO ();

    // Invocar o método create
    $dao->create($quarto);

    // Redirecionar para o index (comentar caso nao funcione)
   header('Location: index.php');


