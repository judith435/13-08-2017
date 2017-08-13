<?php
    require_once 'connection.php';
    require_once 'vendor.php';

    $func = $_POST['func'];

    switch ($func) {
        case 'allSoftwares': 
        $s = Vendor::getAllSoftwares();
        return $s;
            break;
        case 'allVendors':
            $v = Vendor::getAllVendors();
            echo JSON_encode($v);
            break;
        default:
            return 'invalid request';
    }


?>