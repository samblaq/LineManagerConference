<?php

    @session_start();
    include("databaseconnection.php"); 
    //initiating session variables. Should be on all pages
    
    if (isset($_SESSION['Employee_ID'])) {
        $Employee_FullName =  $_SESSION['Employee_FullName'];
        $Employee_ID = $_SESSION['Employee_ID'];
        $Employee_Department =  $_SESSION['Employee_Department'];
    }else{
        session_destroy();
    }

?>