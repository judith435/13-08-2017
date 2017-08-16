<?php
    class City { 

        private $id;
        private $name;

        public function __construct($id, $name){
            $this->setID($id);
            $this->setName($name);

        }

        public function geID(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function setID($id){
            $this->id = $id;
        }

        public function setName($name){
            $this->name = $name;
        }

    }

?>