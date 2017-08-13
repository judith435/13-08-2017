<?php
    class Software { 

        private $id;
        private $name;
        private $v_id;

        public function __construct($sw_id, $sw_name, $v_id){
            $this->id = $sw_id;
            $this->setEmpName($sw_name);
            $this->setEmpWorkStartDate($v_id); 

        }

        public function geID(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function getV_id(){
            return $this->v_id;
        }

        public function setName($sw_name){
            $this->name = $sw_name;
        }

        public function setV_id($v_id){
            if($v_id == ''){
                $this->v_id = date("Y-m-d");
            }
            else {
                $this->v_id = $v_id;
            }
        }
            

    }

