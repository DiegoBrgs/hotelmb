<?php  
    class QuartoDAO {
        public function create ($quarto) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO quarto(numero, andar, status_quarto, hotel_id_hotel)
                    VALUES (:n, :a, :s, :h)"
                    );
                    $query->bindValue(':n', $quarto->getNumero(),PDO::PARAM_STR);
                    $query->bindValue(':a', $quarto->getAndar(),PDO::PARAM_STR);
                    $query->bindValue(':s', $quarto->getStatus_quarto(),PDO::PARAM_STR);
                    // Bind para chave estrangeira
                    $query->bindValue(':h', $quarto->getHotel()->getId(),PDO::PARAM_INT);

                    if(!$query->execute()) { 
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage ();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM quarto");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaquarto = array ();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $quarto = new quarto(); // Classe bean
                    $quarto->setId($linha['id_quarto']);
                    $quarto->setNumero($linha['numero']);
                    $quarto->setAndar($linha['andar']);
                    $quarto->setStatus_quarto($linha['status_quarto']);
                    // Atributo da associação
                    $daoHotel = new HotelDAO();
                    $hotel = $daoHotel->find($linha['hotel_id_hotel']);
                    $quarto->setHotel($hotel);

                    array_push($listaquarto, $quarto);
                }

                return $listaquarto;
            
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

         public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM quarto WHERE id_quarto = :i");
                $query->bindValue(':i', $id,PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $quarto = new Quarto(); // Classe bean
                    $quarto->setId($linha['id_quarto']);
                    $quarto->setNumero($linha['numero']);
                    $quarto->setAndar($linha['andar']);
                    $quarto->setStatus_quarto($linha['status_quarto']);
                }

                return $quarto;
            
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }


        }

        public function update($quarto) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE quarto
                    SET numero = :n, andar = :a, status_quarto = :s, hotel_id_hotel = :h
                    WHERE id_quarto = :i"
                    );
                    $query->bindValue(':n', $quarto->getNumero(),PDO::PARAM_STR);
                    $query->bindValue(':a', $quarto->getAndar(),PDO::PARAM_STR);
                    $query->bindValue(':s', $quarto->getStatus_quarto(),PDO::PARAM_STR);
                    $query->bindValue(':h', $quarto->getHotel()->getId(),PDO::PARAM_INT);
                    $query->bindValue(':i', $quarto->getId(),PDO::PARAM_INT);

                    if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage ();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM quarto
                    WHERE id_quarto = :i"
                    );
                    $query->bindValue(':i', $id,PDO::PARAM_INT);

                    if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage ();
            }
        }

    

    }