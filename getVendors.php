<?php
    require_once 'Connection.php';

    $emptyParms = []; 
    $con = new Connection('ls47');
    $sqlStatement = "SELECT id , name  FROM vendors";
    $stmt = $con->executeStatement($sqlStatement, $emptyParms);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

?>