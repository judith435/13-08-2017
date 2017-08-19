<?php
    require_once 'PDO_Parm.php';
    class Street { 

        //members must be public so that  JSON_encode($streets); in function GetDisplayStreets() in CitiesApi.php will work
        public $id;
        public $name;
        public $c_id;
        public $c_name;


        public function __construct($sw_id, $sw_name, $c_id, $c_name){
            $this->setID($sw_id);
            $this->setName($sw_name);
            $this->setC_id($c_id); 
            $this->setC_name($c_name); 

        }

        public function geID(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function getC_id(){
            return $this->c_id;
        }

        public function getC_name(){
            return $this->c_name;
        }

        public function setID($sw_id){
            $this->id = $sw_id;
        }

        public function setName($sw_name){
            $this->name = $sw_name;
        }

        public function setC_id($c_id){
            $this->c_id = $c_id;
        }

        public function setC_name($c_name){
            $this->c_name = $c_name;
        }

        public static function getAllStreets() {
        //select statement has no parameters for sql statement -> must send empty parms: executeSP is general function that executes 
        //sql statement with and without parameters
            $emptyParms = []; 
            $con = new Connection('ls47');
            $sp = $con->executeSP("get_Streets", $emptyParms);

            $allStreets = array();
            while ($row = $sp->fetch())
            {
               array_push($allStreets, new Street($row['street_id'], $row['street_name'], $row['city_id'], $row['city_name']));
            }
            return $allStreets;
        }


        public static function addStreet($streetName, $city_id, $city_name) {

            $Street = new Street(0, $streetName, $city_id, $city_name);

            $con = new Connection('ls47');
            $Parms =  array();
            array_push($Parms, new PDO_Parm("street_name", $Street -> getName(), 'string')); 
            array_push($Parms, new PDO_Parm("street_c_id", $Street -> getC_id(), 'integer'));
            $stmt = $con->executeSP('check_Street_exists', $Parms);

            if ($stmt->rowCount() > 0) {
                echo "Street with same name (" . $Street->getName() . ") and same city (" . $Street -> getC_name() . ") found! Cannot be added!";     
            }
            else {
                $con = new Connection('ls47');
                $Parms =  array();
                array_push($Parms, new PDO_Parm("street_name", $Street -> getName(), 'string')); 
                array_push($Parms, new PDO_Parm("street_c_id", $Street -> getC_id(), 'integer'));
                $stmt = $con->executeSP('insert_Street', $Parms);

                 echo 'new street added successfully';
            }
        }

    }

