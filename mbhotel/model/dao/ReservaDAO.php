<?php  
    class ReservaDAO {
        public function create ($reserva) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO reserva(data_reserva, entrada, saida, usuarios_id_usuarios)
                    VALUES (:d, :e, :s, :u)"
                    );
                    $query->bindValue(':d', $reserva->getData_reserva(),PDO::PARAM_STR);
                    $query->bindValue(':e', $reserva->getEntrada(),PDO::PARAM_STR);
                    $query->bindValue(':s', $reserva->getSaida(),PDO::PARAM_STR);
                    // Bind para chave estrangeira
                    $query->bindValue(':u', $reserva->getUsuarios()->getId(),PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM reserva");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaReserva = array ();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $reserva = new reserva(); // Classe bean
                    $reserva->setId($linha['id_reserva']);
                    $reserva->setData_reserva($linha['data_reserva']);
                    $reserva->setEntrada($linha['entrada']);
                    $reserva->setSaida($linha['saida']);
                    // Atributo da associação
                    $daoUsuarios = new UsuariosDAO();
                    $usuarios = $daoUsuarios->find($linha['usuarios_id_usuarios']);
                    $reserva->setUsuarios($usuarios);

                    array_push($listaReserva, $reserva);
                }

                return $listaReserva;
            
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

         public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM reserva WHERE id_usuarios = :i");
                $query->bindValue(':i', $id,PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $reserva = new reserva(); // Classe bean
                    $reserva->setId($linha['id_usuarios']);
                    $reserva->setNome($linha['nome']);
                    $reserva->setCpf($linha['cpf']);
                    $reserva->setEmail($linha['email']);
                    $reserva->setSenha($linha['senha']);
                }

                return $reserva;
            
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }


        }

        public function update($reserva) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE reserva
                    SET nome = :n, cpf = :c, email = :e, senha = :s
                    WHERE id_usuarios = :i"
                    );
                    $query->bindValue(':n', $reserva->getNome(),PDO::PARAM_STR);
                    $query->bindValue(':c', $reserva->getCnpj(),PDO::PARAM_STR);
                    $query->bindValue(':e', $reserva->getEmail(),PDO::PARAM_STR);
                    $query->bindValue(':s', $reserva->getSenha(),PDO::PARAM_STR);
                    $query->bindValue(':i', $reserva->getId(),PDO::PARAM_INT);

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
                    "DELETE FROM reserva
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