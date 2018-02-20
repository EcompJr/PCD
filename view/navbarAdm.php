<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="pcd.php">
            <img src="../assets/images/ecomp/logo.png" width="30">
            </a>
            <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>-->
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll scrollSuave" href="pcd.php">Membros</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle page-scroll scrollSuave" data-toggle="dropdown" href="#">Gerenciar
                        <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="advertencias.php">Advertências</a>
                            </li>
                            <li>
                                <a href="contas.php">Contas</a>
                            </li>
                        </ul>
                    </li>
                    <?php if(isset($_SESSION['auth'])){echo '<li><button id="logout" class="btn btn-default navbar-btn page-scroll">Logout</button></li>';}?>
                    
                </ul>
            </div>

        <!-- /.navbar-collapse -->
    </div>
<!-- /.container-fluid -->
</nav>

