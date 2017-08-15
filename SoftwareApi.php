<?php
    require_once 'Connection.php';
    require_once 'Software.php';
    require_once 'Vendor.php';

    if (isset($_POST["activity"])){
        $activity = $_POST["activity"];

        if($activity == "ShowSoftware") {
            ShowSoftware();
        }
        else
        {
            AddSoftWare();
        }
    }
    else {
      echo "no button clicked"; 
    }


    function ShowSoftware(){
        GetDisplaySoftware();
    }

    function AddSoftware(){

        $softwareName = trim($_POST["softwareName"]);
        if($softwareName == '')  //testing isset($_POST["softwareName"]) meaningless -> it is always true
        {
            echo 'Please enter Software Name';
            return;
        }

        $vendor = explode(",", $_POST["vendor"]);//
        if($vendor[0] == '0')  // $_POST["vendor"] contains vendor_id,vendor_name; e.g. "1,IBM" => 1st element  contains vendor code 2nd element vendor name
        {
            echo 'Please select vendor';
            return;
        }

        Software::addSoftware($softwareName, $vendor[0], $vendor[1]);
        GetDisplaySoftware();
    }

    function GetDisplaySoftware(){
        echo '<h3>List of all Software</h3>';
        $software = Software::getAllSoftware();

        if(count($software) == 0){
            echo "no software found - table empty";
            return;
        }

        foreach ($software as $item) {
            echo 'sw_id = ' . $item->geID() . "<br>";
            echo 'sw_name ' . $item->getName() . "<br>";
            echo 'vendor_id ' . $item->getV_id() . "<br>";
            echo 'vendor_name ' . $item->getV_name() . "<br><br><br>";

        }
    }


?>