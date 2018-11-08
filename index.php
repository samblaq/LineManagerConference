<?php
 
    include("session.php");
    include("databaseconnection.php");
    // if (isset($_SESSION['sign_out_success'] )) {
    //     $sign_out_success = $_SESSION['sign_out_success'];
    //     echo '<div class="alert alert-success alert-dismissible fade show"       role="alert">'.$sign_out_success.'
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    //     </button></div>';
    //     session_unset();
    //     session_destroy();
    //   }
    if(isset($_POST['submit'])) {
        function sanitize($data){
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            $data = trim($data);
            return $data;
        }

        
        if (empty($_POST['PWID'])){
            $errorlogin = "Invalid PWID";
        }else{
            $PWID = sanitize($_POST['PWID']);

            $sql = "SELECT * FROM employee_info where PWID = '$PWID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    if ($PWID == $row['PWID']){
                        @session_start();
                        $_SESSION['Employee_ID'] = $row['PWID'];
                        $_SESSION['Employee_FullName'] = $row['FullName'];
                        $_SESSION['Employee_Department'] = $row['Department'];
                        header("location:PostPreTest.php"); 
                        exit();
                    }else{
                        $errorlogin = "Invalid Bank ID";
                    }
                }
            }else{
                $errorlogin = "Invalid Bank ID";
            }
        }
    }

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Manager Conference 2018</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <style>
        .logo{
            text-align: center;
        }
        h5{
            text-align:center;
            color:green;
        }
        .login-clean form .btn-primary{
            background:#3b96eb;
        }
        .login-clean form .btn-primary:hover{
            background:#3b96eb;
        }
        /* .login-clean , body{
            background:url(assets/images/headoffice.png) center no-repeat;
            z-index:9999;00
            
        } */

    </style>
</head>

<body>
    <div class="login-clean">
        <form method="post">
            <?php
                if (isset($errorlogin)){
                    echo 
                    "<div class='alert alert-danger alert-dismissable'>
                        <i class='fa fa-check'></i>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        $errorlogin
                    </div>";
                }
            ?>
            <div class="logo">
                <img src="assets/images/SCB.jpg" alt="logo" width="200px" height="150px">
            </div>
            <h5>Welcome to Line Managers Conference 2018</h3>
            <br><br>
            <div class="form-group">
                <input class="form-control" type="text" name="PWID" placeholder="Bank ID">
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" name="submit">Register</button>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>