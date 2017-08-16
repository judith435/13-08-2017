<?php
    require_once 'Connection.php';
    require_once 'Street.php';
    require_once 'City.php';


    if (isset($_POST["activity"])){
        $activity = $_POST["activity"];

        if($activity == "ShowStreet") {
            ShowStreet();
        }
        else
        {
            AddStreet();
        }
    }
    else {
      echo "no button clicked"; 
    }


    function ShowStreet(){
        GetDisplayStreets();
    }

    function AddStreet(){

        $streetName = trim($_POST["streetName"]);
        if($streetName == '')  //testing isset($_POST["streetName"]) meaningless -> it is always true
        {
            echo 'Please enter Street Name';
            return;
        }

        $city = explode(",", $_POST["city"]);//
        if($city[0] == '0')  // $_POST["city"] contains city_id, city_name; e.g. "1,London" => 1st element  contains city code 2nd element city name
        {
            echo 'Please select city';
            return;
        }

        Street::addStreet($streetName, $city[0], $city[1]);
        GetDisplayStreets();
    }

    function GetDisplayStreets(){
        echo '<h3>List of all Streets</h3>';
        $streets = Street::getAllStreets();

        if(count($streets) == 0){
            echo "no Streets found - table empty";
            return;
        }
        echo JSON_encode($streets);    
        // foreach ($streets as $item) {
        //     echo 'street_id = ' . $item->geID() . "<br>";
        //     echo 'street_name ' . $item->getName() . "<br>";
        //     echo 'city_id ' . $item->getC_id() . "<br>";
        //     echo 'city_name ' . $item->getC_name() . "<br><br><br>";

        // }
    }


?>