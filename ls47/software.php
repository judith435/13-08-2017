<?php
class Software {
    private $name;
    private $v_id;
    private $id; // auto indentity

    function __construct($id, $name, $v_id) {
        $this->id = $id;
        $this->name = $name;
        $this->v_id = $v_id;
    }


    public static function getAllSoftwares() {
        $con = new Connection();
        $stmt = $con->executeStatement('select * from ls47_software');
        while ($row = $stmt->fetch())
        {
            echo $row['name'] . "\n";
        }
        
    }  
    

}
?>