<?php  
    class UsuariosDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM usuarios");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaUsuarios = array ();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $usuarios = new Usuarios(); // Classe bean
                    $usuarios->setId($linha['id_usuarios']);
                    $usuarios->setNome($linha['nome']);
                    $usuarios->setCPF($linha['cpf']);
                    $usuarios->setEmail($linha['email']);
                    $usuarios->setSenha($linha['senha']);

                    array_push($listaUsuarios, $usuarios);
                }

                return $listaUsuarios;
            
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }


        }

    }