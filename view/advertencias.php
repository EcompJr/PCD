<?php
    session_start();
    require_once("../controller/AdvertenciasController.class.php");
    if (!isset($_SESSION['auth'])) {
		header("location:../view/login.php?valid=false");			
	}
    $adm = null;
    //Verica o cargo do usuario, para exibir botao de gerenciar na navbar
    //caso este seja administrador
    if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
            $adm = true;
        }else{   
            header("location:../view/login.php?adm=false");	
        }
    }
    $advController = new AdvertenciasController();
	$adv = $advController->getAdvertenciasDB();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Advertências PCD</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	
	
    <!-- Icon -->
	<link rel="icon" href="../assets/images/ecomp/logo.png"> 

</head>
<body>
    <?php
        require_once 'navbarAdm.php';
    ?>
	<div class="container-fluid">
	<div class="row">
		<div id="divConteudo" class="container col-md-offset-2 col-md-8">
            <div class="row">
                <div class="table-head">
                    <h4 class="text-justify">Gerenciar Advertências</h4>          
                    <button class="btn btn-primary" onclick="location.href='painel.php';">Cadastrar</button>
                </div>
            </div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Membro</th>
                                    <th>Responsável</th>
                                    <th>Razão</th>
                                    <th>Data</th>
                                    <th>Pontos</th>
                                    <th>Indeferida</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    for ($i=0; $i < sizeof($adv) ; $i++) {
                                        $id = $adv[$i]['id'];
                                        echo "<tr>";
                                        echo "<td>".$adv[$i]['member']."</td>";
                                        echo "<td>".$adv[$i]['responsible']."</td>";
                                        echo "<td>".$adv[$i]['reason']."</td>";
                                        echo "<td>".$adv[$i]['data']."</td>";
                                        echo "<td>".$adv[$i]['points']."</td>";
                                        echo "<td>".$adv[$i]['dismissed']."</td>";


                                        echo "<td><button id='btnEdit' type=\"button\"  class=\"botaoE btn-primary\" style=\"margin-right: 10px;\" onclick=\"editId($id)\"><span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></button><button id='btnDelete' type=\"button\"  class=\"botaoD btn-danger\" onclick=\"deleteId($id)\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></button></td>";
                                        echo "</tr>";	
                                                        
                                    }
                                ?>                                
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript" src="../assets/js/jquery-3.2.1.js"></script>
<!-- <script src="../assets/js/javascript.js"></script> -->
<script type="text/javascript" src="../assets/js/painel.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
crossorigin="anonymous"></script>
<!-- DataTable imports -->
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
<!-- Datepicker imports -->
<script type="text/javascript" src="../assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript"src="../assets/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".table").DataTable();
    });
</script>
</body>
</html>

