<?php
    class Software { 

        private $id;
        private $name;
        private $v_id;
        private $v_name;


        public function __construct($sw_id, $sw_name, $v_id, $v_name){
            $this->setID($sw_id);
            $this->setName($sw_name);
            $this->setV_id($v_id); 
            $this->setV_name($v_name); 

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

        public function getV_name(){
            return $this->v_name;
        }

        public function setID($sw_id){
            $this->id = $sw_id;
        }

        public function setName($sw_name){
            $this->name = $sw_name;
        }

        public function setV_id($v_id){
            $this->v_id = $v_id;
        }

        public function setV_name($v_name){
            $this->v_name = $v_name;
        }

        public static function getAllSoftware() {
        //select statement has no parameters for sql statement -> must send empty parms: executeStatement is general function that executes 
        //sql statement with and without parameters
            $emptyParms = []; 
            $con = new Connection('ls47');
            // $sqlStatement = "SELECT  tblSoftWare.id as sw_id,
            //                          tblSoftWare.name as sw_name,
            //                          tblVendors.id as vendor_id,
            //                          tblVendors.name as vendor_name
            //                 FROM software tblSoftWare
            //                 inner join vendors tblVendors 
            //                 on tblSoftWare.v_id = tblVendors.id";
            // $stmt = $con->executeStatement($sqlStatement, $emptyParms);
            $sp = $con->executeSP("get_Software", $emptyParms);

            //$json1 =  json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            //$obj = json_decode($json1,true);

            $allSoftware = array();
            while ($row = $sp->fetch())
            {
               array_push($allSoftware, new Software($row['sw_id'], $row['sw_name'], $row['vendor_id'], $row['vendor_name']));
            }
           
            return $allSoftware;
        }


        public static function addSoftware($softwareName, $vendor_id, $vendor_name) {

            $Software = new Software(0, $softwareName, $vendor_id, $vendor_name);

            $con = new Connection('ls47');
            $Parms = ["sw_name" => $Software -> getName(), "sw_v_id" => $Software -> getV_id()]; 
            $stmt = $con->executeStatement('SELECT name FROM software WHERE name = :sw_name  AND v_id = :sw_v_id', $Parms);
            if ($stmt->rowCount() > 0) {
                echo "Software with same name (" . $Software->getName() . ") and same vendor (" . $Software -> getV_name() . ") found! Cannot be added!";     
            }
            else {
                $con = new Connection('ls47');
                $Parms = ["sw_name" => $Software -> getName(), 
                        "vendor_id" => $Software -> getV_id()]; 
                $stmt = $con->executeStatement("insert into software (name, v_id)
                                                values  (:sw_name, :vendor_id)", $Parms);
                echo 'new software added successfully';
            }
        }

    }

