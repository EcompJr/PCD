<?php
    session_start();
    require_once("../controller/MembrosController.class.php");
    require_once("../controller/AdvertenciasController.class.php");

    // //verifica se esta logado
    // if (!isset($_SESSION['auth'])) {
    //     header("location:/view/login.php?valid=false");
    // }
    //Verica o cargo do usuario, para exibir botao de gerenciar na navbar
    //caso este seja administrador
    if(!isset($_SESSION['auth'])){
        //echo "not logged";
    }
    $adm = null;
    if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
            $adm = true;            
        }else{
            $adm = false;       
        }
    }

    $membrosController = new MembrosController();
    $contas = $membrosController->getContas();

    $advController = new AdvertenciasController();
	$adv = $advController->getAdvertenciasDB();
?>

<!DOCTYPE html>
<html>

<head>
    <title>PCD - ECOMP Jr.</title>
    <meta charset="UTF-8">
   <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://use.fontawesome.com/330b781289.js"></script>

    <script src="../assets/js/jquery-3.2.1.js"></script>
    <script src="../assets/js/javascript.js"></script>  

    <!-- Icon -->
    <link rel="icon" href="../assets/images/ecomp/logo.png">

    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>      
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/stylepcd.css">
</head>

<body>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top bg-gray">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/images/ecomp/logo.png" width="30">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll scrollSuave" href="#AG">A-G</a></li>
                    <li><a class="page-scroll scrollSuave" href="#KN">K-N</a></li>
                    <li><a class="page-scroll scrollSuave" href="#OT">O-T</a></li>
                    <li><a class="page-scroll scrollSuave" href="#UZ">U-Z</a></li>
                    <?php if($adm == true){echo '<li class="dropdown"><a class="dropdown-toggle page-scroll scrollSuave" data-toggle="dropdown" href="#">Gerenciar<span class="caret"></span></a><ul class="dropdown-menu"><li><a href="painel.php">Advertências</a></li><li><a href="contas.php">Contas</a></li></ul></li>';}?>
                    <?php if(isset($_SESSION['auth'])){echo '<li><button id="logout" class="btn btn-default navbar-btn page-scroll">Logout</button></li>';}?>
                   
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="message"></h1>
                <hr>
                <a href="#AG" class="btn btn-primary btn-xl page-scroll scrollSuave">Iniciar</a>
                <hr>
            </div>
        </div>
    </header>

    <!-- Members set -->
    <div id='AG'>
        <div class="col-lg-12">
            <h2 class="page-header">A-G</h2>
        </div>

        <div class="container">
            <div class="row">
                
                <?php
                    for ($i=0; $i < sizeof($contas) ; $i++) {
                        $x='0';
                        echo '<!-- Start Member --><div id="effect-1" class="col-lg-4 col-sm-6 effects clearfix"><div class="img img-memberIcon img-circle img-responsive"><img class="memberIcon" src="../assets/images/ecomp/membros/'.$contas[$i]["login"].'" width=200 height=200 alt="" /><div class="overlay"><a href="#window1" data-toggle="modal" class="expand pointsText">20 PONTOS</a></div></div><div class="modal fade" id="window1" tabindex="-1" role="dialog" aria-labelledby="window1" aria-hidden="true"><div class="modal-dialog modal-lg modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><img class="img img-responsive img-companyLogo" src="../assets/images/ecomp/logoNome.png" width="200" height="50"></img><h1 id="insideWidow" class="memberName text-right"><i class="fa fa-user-o" aria-hidden="true"></i> Alisson Vilas<div id="insideWidow" class="memberClassification text-right">DIRETOR</div></h1></div><div class="modal-body"><img class="img-memberWindow img img-rounded img-responsive" src="../assets/images/ecomp/membros/'.$contas[$i]["login"].'" width="300" height="405" alt=""></img><hr class="dark"><p class="text-center historicTitle">HISTÓRICO</p><hr class="dark"><div><p class="text-Window text-center"><span class="numberPunition">#1</span> <span class="topicPunition">PERDEU</span> <span class="numberPunition">XX</span> <span class="topicPunition">PONTOS EM XX/XX/XXXX POR XXXXXXXXXX<br><span class="responsiblePunition">RESPONSÁVEL:</span> XXXXXXXX</p><hr><p class="text-Window text-center"><span class="numberPunition">#2</span> <span class="topicPunition">PERDEU</span> <span class="numberPunition">XX</span> <span class="topicPunition">PONTOS EM XX/XX/XXXX POR XXXXXXXXXX<br><span class="responsiblePunition">RESPONSÁVEL:</span> XXXXXXXX</p><hr><p class="text-Window text-center"><span class="numberPunition">#3</span> <span class="topicPunition">PERDEU</span> <span class="numberPunition">XX</span> <span class="topicPunition">PONTOS EM XX/XX/XXXX POR XXXXXXXXXX<br><span class="responsiblePunition">RESPONSÁVEL:</span> XXXXXXXX</p><hr></div></div></div></div></div><h3 class="memberName">'.$contas[$i]["name"].'<div class="memberClassification">'.$contas[$i]["occupation"].'</div></h3></div>';

                    }
                ?>
                  
      
                                                                                                                        
            
                
    </div>
                <!-- End Member -->                
    <!-- End members set -->
    

    <!-- Members set -->
    <div id='KN'>
        <div class="col-lg-12">
            <h2 class="page-header">K-N</h2>
        </div>

        <div class="container"></div>
            <div class="row"></div>
             
    </div>
    <!-- End members set -->

    <!-- Members set -->
    <div id='OT'>
        <div class="col-lg-12">
            <h2 class="page-header">O-T</h2>
        </div>

        <div class="container"> </div>
            <div class="row"> </div>  
    </div>
    <!-- End members set -->    

        
        
    <!-- Team Members Row -->
    <div id='UZ'>
        <div class="col-lg-12">
            <h2 class="page-header">U-Z</h2>
        </div>
    </div>
    </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>
</html>