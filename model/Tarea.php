<?php
    class Tarea{
        private $codTarea;
        private $codUsuario;
        private $descripcionTarea;
        private $fechaCreacion;
        private $fechaTareaRealizada;
        
        public function __construct($codTarea, $codUsuario, $descripcionTarea, $fechaCreacion, $fechaTareaRealizada) {
            $this->codTarea = $codTarea;
            $this->codUsuario = $codUsuario;
            $this->descripcionTarea = $descripcionTarea;
            $this->fechaCreacion = $fechaCreacion;
            $this->fechaTareaRealizada = $fechaTareaRealizada;
        }

        public function getCodTarea() {
            return $this->codTarea;
        }

        public function getCodUsuario() {
            return $this->codUsuario;
        }

        public function getDescripcionTarea() {
            return $this->descripcionTarea;
        }

        public function getFechaCreacion() {
            return $this->fechaCreacion;
        }

        public function getFechaTareaRealizada() {
            return $this->fechaTareaRealizada;
        }

        public function setCodTarea($codTarea): void {
            $this->codTarea = $codTarea;
        }

        public function setCodUsuario($codUsuario): void {
            $this->codUsuario = $codUsuario;
        }

        public function setDescripcionTarea($descripcionTarea): void {
            $this->descripcionTarea = $descripcionTarea;
        }

        public function setFechaCreacion($fechaCreacion): void {
            $this->fechaCreacion = $fechaCreacion;
        }

        public function setFechaTareaRealizada($fechaTareaRealizada): void {
            $this->fechaTareaRealizada = $fechaTareaRealizada;
        }


    }
?>
