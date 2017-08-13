<?php
    require_once 'Connection.php';
    require_once 'Software.php';
    require_once 'Vendor.php';

    if(isset($_POST["activity"])){
        $activity = $_POST["activity"];

        if($activity == "ShowSoftware") {
            GetAllSoftware();
        }
        else
        {
            AddSoftWare();
        }
    }
    else {
      echo "no button clicked"; 
    }


    function GetAllSoftware(){
        echo '<h3>List of all Software</h3>';
        $con = new Connection('northwind');
        DisplayAllSoftware($con);
    }

    function AddSoftware(){
        $con = new Connection('northwind');
        $emptyParms = []; 
        $sqlStatement = "SELECT id , name  FROM northwind.l47_vendor"; 
        $stmt = $con->executeStatement($sqlStatement, $emptyParms);


        if($stmt->rowCount() == 0){
            echo "no vendors found - table empty";
            return;
        }

        $json =  json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

        while ($row = $stmt->fetch())
        {
            echo 'id ' . $row['id']  . "<br>";
            echo 'name ' . $row['name']. "<br><br><br>";
        }

    }

    function createJson(){


    }

    function DisplayAllSoftware($con){
        //select statement has no parameters for sql statement -> must send empty parms: executeStatement is general function that executes 
        //sql statement with and without parameters
        $emptyParms = []; 
        $sqlStatement = "SELECT  tblSoftWare.id as sw_id,
                                 tblSoftWare.name as sw_name,
                                 tblVendors.id as vendor_id,
                                 tblVendors.name as vendor_name
                        FROM northwind.l47_software tblSoftWare
                        inner join northwind.l47_vendor tblVendors 
                        on tblSoftWare.v_id = tblVendors.id";
        $stmt = $con->executeStatement($sqlStatement, $emptyParms);

        if($stmt->rowCount() == 0){
            echo "no employees found - table empty";
            return;
        }

        while ($row = $stmt->fetch())
        {
            echo 'sw_id = ' . $row['sw_id'] . "<br>";
            echo 'sw_name ' . $row['sw_name'] . "<br>";
            echo 'vendor_id ' . $row['vendor_id']  . "<br>";
            echo 'vendor_name ' . $row['vendor_name']. "<br><br><br>";
        }
    }


?>