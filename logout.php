<?php
include("session.php");
include("databaseconnection.php");
@session_start();
	if(session_destroy()) // Destroying All Sessions
    {
        header("Location: LogoutSuccessfully.php"); // Redirecting To Home Page
        exit();
    }

?>