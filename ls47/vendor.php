<?php   
    require_once 'connection.php';
    
    class Vendor {
        public $name;
        public $id;

        function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
            // go to DB and bring name
        }
    
        public static function getAllVendors() {
            $con = new Connection();
            
            $allVendors = array();

            $stmt = $con->executeStatement('select * from ls47_vendor');
            while ($row = $stmt->fetch())
            {
               array_push($allVendors, new Vendor($row['id'], $row['name']));
            }
           
            return $allVendors;
        }
    }
?>