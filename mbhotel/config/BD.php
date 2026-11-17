<?php
    class BD {
        public static function getConexao () {
            $conn = new PDO(
                "mysql:host=localhost;dbname=hoteismb",
                "root",
                "root"
            );

            return $conn;
        }
    }