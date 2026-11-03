<?php  
    class Reserva {
        // Atributos
        private $id;
        private $data_reserva;
        private $entrada;
        private $saida;
        private $usuarios; // Associção

 // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getData_reserva() {
            return $this->data_reserva;
        }

        public function setData_reserva($data_reserva) {
            $this->data_reserva = $data_reserva;
        }

        public function getEntrada() {
            return $this->entrada;
        }

        public function setEntrada($entrada) {
            $this->entrada = $entrada;
        }

        public function getSaida() {
            return $this->saida;
        }

        public function setSaida($saida) {
            $this->saida = $saida;
        }

        // Get e Set do atributo de associação

         public function getUsuarios() {
            return $this->usuarios;
        }

        public function setUsuarios ($usuarios) {
            $this->usuarios = $usuarios;
        }
    }