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
        case 'getCities':
              getCities();  
              break;
        default:
            die('Access denied for this function!');
    }

    function getCities() {

        $emptyParms = []; 
        $con = new Connection('ls47');
        $sp = $con->executeSP("get_Cities", $emptyParms);
        echo json_encode($sp->fetchAll(PDO::FETCH_ASSOC));
        
    }

?>