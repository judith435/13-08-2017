<?php
    class Vendor { 

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


        public static function getVendors() {
            $emptyParms = []; 
            $con = new Connection('ls47');
            $sqlStatement = "SELECT id , name  FROM vendors";
            $stmt = $con->executeStatement($sqlStatement, $emptyParms);
            //$json1 =  json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            //$obj = json_decode($json1,true);

            $Vendors = array();
            while ($row = $stmt->fetch())
            {
               array_push($Vendors, new Vendor($row['id'], $row['name']));
            }
           
            return $Vendors;
        }  


    }

?>