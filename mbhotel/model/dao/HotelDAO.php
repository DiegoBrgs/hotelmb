<?php  
    class HotelDAO {
        public function create ($hotel) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO hotel(nome, cnpj, telefone, email, endereco)
                    VALUES (:n, :c, :t, :m, :e)"
                    );
                    $query->bindValue(':n', $usuarios->getNome(),PDO::PARAM_STR);
                    $query->bindValue(':c', $usuarios->getCnpj(),PDO::PARAM_STR);
                    $query->bindValue(':t', $usuarios->getTelefone(),PDO::PARAM_STR);
                    $query->bindValue(':m', $usuarios->getEmail(),PDO::PARAM_STR);
                    $query->bindValue(':e', $usuarios->getEndereco(),PDO::PARAM_STR);

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

         public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM hotel WHERE id_hotel = :i");
                $query->bindValue(':i', $id,PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $hotel = new hotel(); // Classe bean
                    $hotel->setId($linha['id_hotel']);
                    $hotel->setNome($linha['nome']);
                    $hotel->setCnpj($linha['cnpj']);
                    $hotel->setTelefone($linha['telefone']);
                    $hotel->setEmail($linha['email']);
                    $hotel->setEndereco($linha['endereco']);
                }

                return $hotel;
            
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }


        }

        public function update($hotel) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE hotel
                    SET nome = :n, cnpj = :c, telefone = :f, email = :m, endereco = :e
                    WHERE id_hotel = :i"
                    );
                    $query->bindValue(':n', $hotel->getNome(),PDO::PARAM_STR);
                    $query->bindValue(':c', $hotel->getCnpj(),PDO::PARAM_STR);
                    $query->bindValue(':t', $hotel->getTelefone(),PDO::PARAM_STR);
                    $query->bindValue(':m', $hotel->getEmail(),PDO::PARAM_STR);
                    $query->bindValue(':e', $hotel->getEndereco(),PDO::PARAM_STR);
                    $query->bindValue(':i', $hotel->getId(),PDO::PARAM_INT);

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
                    "DELETE FROM hotel
                    WHERE id_usuarios = :i"
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