<?php  
    class Funcionarios {
        // Atributos
        private $id;
        private $nome;
        private $cpf;
        private $telefone;
        private $cargo;
        private $hotel; // Associção

 // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getCpf() {
            return $this->cpf;
        }

        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function getCargo() {
            return $this->cargo;
        }

        public function setCargo($cargo) {
            $this->cargo = $cargo;
        }

        // Get e Set do atributo de associação

         public function getHotel() {
            return $this->hotel;
        }

        public function setHotel ($hotel) {
            $this->hotel = $hotel;
        }
    }