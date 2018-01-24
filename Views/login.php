<!DOCTYPE html>
<html>

<head>
    <title>PCD - ECOMP Jr.</title>
    <meta charset="UTF-8">    
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="../Assets/js/jquery-3.2.1.js"></script>
    <script src="../Assets/js/javascript.js"></script>

    <!-- Icon -->
    <link rel="icon" href="Assets/images/ecomp/logo.png">    
</head>

<body>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                <img src="../Assets/images/ecomp/logo.png" width="30">
                </a>
                <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll scrollSuave" href="#about">Sobre</a>
                    </li>
                    <li>
                        <a class="page-scroll scrollSuave" href="#rules">Regras</a>
                    </li>
                    <li>
                        <a class="page-scroll scrollSuave" href="pcd.html">Membros</a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="message"></h1>
                <hr>
                <form action = "../Routes/routes.php" method = "POST">
                    
                    <div class="form-group">
                        <label for="login">Login de Usuário</label>
                        <input style="width:300px;" type="text" class="form-control" id="login" name = "login" placeholder="Enter email">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input style="width:300px;" type="password" class="form-control" id="password" name = "password" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="loginAttempt" >Entrar</button>
                
                </form>
            </div>
        </div>
    </header>

    
    
</body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

</html>