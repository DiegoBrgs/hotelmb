<?php  
    class Quarto {
        // Atributos
        private $id;
        private $numero;
        private $andar;
        private $status_quarto;
        private $hotel; // Associção

 // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }

        public function getAndar() {
            return $this->andar;
        }

        public function setAndar($andar) {
            $this->andar = $andar;
        }

        public function getStatus_quarto() {
            return $this->status_quarto;
        }

        public function setStatus_quarto($status_quarto) {
            $this->status_quarto = $status_quarto;
        }

        // Get e Set do atributo de associação

         public function getHotel() {
            return $this->hotel;
        }

        public function setHotel ($hotel) {
            $this->hotel = $hotel;
        }
    }