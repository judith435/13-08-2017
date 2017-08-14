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
        echo '<h3>List of all Software</h3>';
        GetDisplaySoftware();
    }

    function AddSoftware(){
        $vendors = Vendor::getVendors();

        foreach ($vendors as $item) {
            {
                echo 'id ' . $item->geID()  . "<br>";
                echo 'name ' . $item->getName() . "<br><br><br>";
            }
        }
    }

    function GetDisplaySoftware(){
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