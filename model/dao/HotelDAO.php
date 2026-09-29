<?php  
    class HotelDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM hotel");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaHotel = array ();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $hotel = new hotel(); // Classe bean
                    $hotel->setId($linha['id_hotel']);
                    $hotel->setNome($linha['nome']);
                    $hotel->setCNPJ($linha['cnpj']);
                    $hotel->setTelefone($linha['telefone']);
                    $hotel->setEmail($linha['email']);
                    $hotel->setEndereco($linha['endereco']);

                    array_push($listaHotel, $hotel);
                }

                return $listaHotel;
            
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }


        }

    }