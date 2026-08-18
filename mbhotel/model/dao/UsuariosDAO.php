<?php  
    class UsuariosDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM usuarios");
                // Continuar a partir daqui...
            
            
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }


        }

    }