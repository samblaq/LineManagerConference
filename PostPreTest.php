<?php
    include("session.php");
    include("databaseconnection.php");

    if (isset($_POST['submit'])) {
        if (empty($_POST['Q1']) || empty($_POST['rating']) || empty($_POST['ratings'])){
            $error = "Answer all questions please";
        }else{
    
    function sanitize($data){
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = trim($data);
        return $data;
    }
    
    $timezone = 'Africa/Accra';
    $timestamp = time();
    $timeDate = new DateTime("now" , new DateTimeZone($timezone));
    $timeDate->setTimestamp($timestamp);

    $TimeRecorded = $timeDate->format("d-m-Y h:i a");

    $Q1 = sanitize($_POST['Q1']);
    $rating = sanitize($_POST['rating']);
    $ratings = sanitize($_POST['ratings']);
    $PWID = $Employee_ID;
    $FullName = $Employee_FullName;
    $Department =  $Employee_Department;
    $Comments = "PreTest";

    $sql_answer = "INSERT INTO postpretest (Q1,Q2,Q3,PWID,FullName,Department,Comments,TimeRecorded) values ('$Q1', '$rating','$ratings','$PWID', '$FullName','$Department','$Comments','$TimeRecorded')";
    $result = $conn->query($sql_answer);

    if ($sql_answer == true) {
        $SuccessMessage = ' <div style="width:100px"class="alert alert-success alert-dismissable" id="flash-msg">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
        <h4><i class="icon fa fa-check"></i>Success!!!</h4>
        </div>';
    }

        header("location:logout.php"); 
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
    <link rel="stylesheet" href="assets/css/styless.min.css">
    <style>
        .login-clean form{
            max-width:700px;
        }

        .login-clean form .btn-primary{
            background:#3b96eb;
        }
        .login-clean form .btn-primary:hover{
            background:#3b96eb;
        }

        input[type=radio]{
            /* padding-left:15px; */
            margin:10px;
        } 
        .control-label{
            text:strong;
        }
        .name{
            text-align:center;
            margin-bottom:15px;
            font-weight:bold;
            font-size:15px;
        }
    </style>    
</head>

<body>
    <div>
        <nav class="navbar navbar-default navigation-clean">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Line Managers Conference</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active" role="presentation"><a href="#">Welcome, <?php echo $Employee_FullName ?></a></li>
                        <li role="presentation"><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
   
    <div class="login-clean">
        <div class="name">
            Welcome, <?php echo $Employee_FullName; ?>   
        </div>
        <form method="POST" action="#">
        
        <?php
                if (isset($error)){
                    echo 
                    "<div class='alert alert-danger alert-dismissable'>
                        <i class='fa fa-check'></i>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <strong>$error</strong>
                    </div>";
                }
            ?>
            <div class="form-group">
                <label for="Q1" class="control-label">1. As a Line Manager who is my most important stakeholder ?</label>
                <select name="Q1" id="" class="form-control">
                    <option value="0">Select Answer</option>
                    <option value="Direct Reports">Direct Reports</option>
                    <option value="Internal Stakeholder">Internal Stakeholder</option>
                    <option value="External Stakeholders">External Stakeholders</option>
                    <option value="Line Manager">Line Manager</option>
                    <option value="Clients">Clients</option>
                </select>
                
            </div>

            <div class="form-group">
                <label for="Q2" class="control-label">2. I fully understand my role as Line Manager in SCB <br>(On the scale of 1 to 5 where 1 is the least and 5 is the highest)</label><br>
                <label for="radio1"> <input type="radio" name="rating" value="Low">1</label>
                <label for="radio2"> <input type="radio" name="rating" value="Average">2</label>
                <label for="radio3"> <input type="radio" name="rating" value="Good">3</label>
                <label for="radio4"> <input type="radio" name="rating" value="Very Good">4</label>
                <label for="radio5"> <input type="radio" name="rating" value="Excellent">5</label>
            </div>

            <div class="form-group">
                <label for="Q2" class="control-label">3. <strong>I fully understand the different generations in the workplace and how to effectively communicate and engage with them</strong> <br><i>(On the scale of 1 to 5 where 1 is the least and 5 is the highest)</i></label>
                <label for="radio1"> <input type="radio" name="ratings" value="Never">1</label>
                <label for="radio2"> <input type="radio" name="ratings" value="Quite">2</label>
                <label for="radio3"> <input type="radio" name="ratings" value="Sometimes">3</label>
                <label for="radio4"> <input type="radio" name="ratings" value="Maybe">4</label>
                <label for="radio5"> <input type="radio" name="ratings" value="Yes">5</label>
            </div>

            <div>
                <input type="submit" name="submit" class="btn btn-primary form-control">
            </div>
        </form>
    </div>
        
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script>
        $document.ready(function (){
            $("#flash-msg")
        })
    </script> -->
</body>

</html>