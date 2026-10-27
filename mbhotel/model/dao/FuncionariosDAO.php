<?php  
    class FuncionariosDAO {
        public function create ($funcionarios) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO funcionarios(nome, cpf, telefone, cargo, hotel_id_hotel)
                    VALUES (:n, :c, :t, :a, :h)"
                    );
                    $query->bindValue(':n', $funcionarios->getNome(),PDO::PARAM_STR);
                    $query->bindValue(':c', $funcionarios->getCpf(),PDO::PARAM_STR);
                    $query->bindValue(':t', $funcionarios->getTelefone(),PDO::PARAM_STR);
                    $query->bindValue(':a', $funcionarios->getCargo(),PDO::PARAM_STR);
                    // Bind para chave estrangeira
                    $query->bindValue(':h', $funcionarios->getHotel()->getId,PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM funcionarios");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaFuncionarios = array ();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $funcionarios = new funcionarios(); // Classe bean
                    $funcionarios->setId($linha['id_funcionarios']);
                    $funcionarios->setNome($linha['nome']);
                    $funcionarios->setCpf($linha['cpf']);
                    $funcionarios->setTelefone($linha['telefone']);
                    $funcionarios->setCargo($linha['cargo']);
                    // Atributo da associação
                    $daoCategoria = new HotelDAO();
                    $hotel = $daoHotel->find($linha['hotel_id_hotel']);
                    $funcionarios->setHotel();

                    array_push($listaFuncionarios, $funcionarios);
                }

                return $listaFuncionarios;
            
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

         public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM funcionarios WHERE id_hotel = :i");
                $query->bindValue(':i', $id,PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $funcionarios = new funcionarios(); // Classe bean
                    $funcionarios->setId($linha['id_hotel']);
                    $funcionarios->setNome($linha['nome']);
                    $funcionarios->setCnpj($linha['cnpj']);
                    $funcionarios->setTelefone($linha['telefone']);
                    $funcionarios->setEmail($linha['email']);
                    $funcionarios->setEndereco($linha['endereco']);
                }

                return $funcionarios;
            
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }


        }

        public function update($funcionarios) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE funcionarios
                    SET nome = :n, cnpj = :c, telefone = :t, email = :m, endereco = :e
                    WHERE id_hotel = :i"
                    );
                    $query->bindValue(':n', $funcionarios->getNome(),PDO::PARAM_STR);
                    $query->bindValue(':c', $funcionarios->getCnpj(),PDO::PARAM_STR);
                    $query->bindValue(':t', $funcionarios->getTelefone(),PDO::PARAM_STR);
                    $query->bindValue(':m', $funcionarios->getEmail(),PDO::PARAM_STR);
                    $query->bindValue(':e', $funcionarios->getEndereco(),PDO::PARAM_STR);
                    $query->bindValue(':i', $funcionarios->getId(),PDO::PARAM_INT);

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
                    "DELETE FROM funcionarios
                    WHERE id_hotel = :i"
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