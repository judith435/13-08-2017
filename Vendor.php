<?php
    class Vendor { 

        private $id;
        private $name;

        public function __construct($sw_id, $sw_name, $v_id){
            $this->id = $sw_id;
            $this->setEmpName($sw_name);

        }

        public function geID(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }


        public function setName($sw_name){
            $this->name = $sw_name;
        }

    }

