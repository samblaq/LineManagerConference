<?php
    include("session.php");
    include("databaseconnection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>linemanager</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styless.min.css">    

    <style>
        .login-clean form .btn-primary{
            background:#3b96eb;
        }
        .login-clean form .btn-primary:hover{
            background:#3b96eb;
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
       
        <form method="POST">
            <div style="text-align:center">
                <?php
                    if (isset($_POST['pre'])) {
                        header("Location:Pretest.php");
                    }
                ?>
                <label for="pre">
                    <input type="submit" name="pre" value="Pre-Test" class="btn btn-primary form-control">
                </label>
            </div>

            <div style="text-align:center">
                <label for="post">
                    <input type="submit" name="post" value="Post-Test" class="btn btn-primary form-control" >
                </label>
            </div>
        </form>
    </div>
        
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>