<?php 
    class Usuario{
        private $codUsuario;
        private $password;
        private $nombreUsuario;
        
        public function __construct($codUsuario, $password, $nombreUsuario) {
            $this->codUsuario = $codUsuario;
            $this->password = $password;
            $this->nombreUsuario = $nombreUsuario;
        }

        public function getCodUsuario() {
            return $this->codUsuario;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getNombreUsuario() {
            return $this->nombreUsuario;
        }

        public function setCodUsuario($codUsuario): void {
            $this->codUsuario = $codUsuario;
        }

        public function setPassword($password): void {
            $this->password = $password;
        }

        public function setNombreUsuario($nombreUsuario): void {
            $this->descUsuario = $nombreUsuario;
        }
    }
?>