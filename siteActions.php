<?php
    require_once 'Connection.php';

    if(isset($_POST['action']) && function_exists($_POST['action'])) {
        $action = $_POST['action'];
    }
    else
    {
        die();
    }

    switch($action) {
        case 'getVendors':
              getVendors();  
              break;
        default:
            die('Access denied for this function!');
    }

    function getVendors() {

        $emptyParms = []; 
        $con = new Connection('ls47');
        //$sqlStatement = "SELECT id , name  FROM vendors union select 0 as id , '' as name order by id ";
        //$stmt = $con->executeStatement($sqlStatement, $emptyParms);
        $sp = $con->executeSP("get_Vendors", $emptyParms);
        echo json_encode($sp->fetchAll(PDO::FETCH_ASSOC));
        
    }

?>