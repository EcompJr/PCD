<?php
    session_start();
    require_once("../controller/MembrosController.class.php");
    if (!isset($_SESSION['auth'])) {
	//	header("location:../view/login.php?valid=false");	
		echo "not logged";			
	}
    // $adm = null;
    // //Verica o cargo do usuario, para exibir botao de gerenciar na navbar
    // //caso este seja administrador
    // if(isset($_SESSION['cargo'])){
    //     if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
    //         $adm = true;
    //     }else{
    //         header("location:../view/profile.php?adm=false");
    //     }
    // }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Advertências</title>

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="../assets/css/bootstrap-datepicker.css" rel="stylesheet">
	
	    <!-- Icon -->
	<link rel="icon" href="../assets/images/ecomp/logo.png"> 

</head>
<body>
	<?php
    $adm = $conta['0']['privilege'];
    if($adm == 1){        
      require_once 'navbarAdm.php';
    }else if($adm == 0){
      require_once 'navbar.php';
    }
    require_once '../controller/MembrosController.class.php';

	?>
  <br>
  <br>
	<div class="container-fluid">
		<div class="row">
			<div id="divConteudo" class="container col-md-offset-1 col-md-10">
				<h4 class="text-justify">Meu Perfil</h4>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
            <div class="container">
      <div class="row">
      
      <!--<div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit.html" >Edit Profile</A>

        <A href="edit.html" >Logout</A>
       <br>
      <p class=" text-info">May 05,2014,03:00 pm </p>
      </div>-->
        
        
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <!--<div class="panel panel-info">
            <!--<div class="panel-heading">
              <h3 class="panel-title">Sheena Shrestha</h3>
            </div>-->
        
        <?php
            $id = $_GET['id'];
            $conta = MembrosController::getContaById($id);
            $name = $conta['0']['name'];
            $birthday = $conta['0']['birthday'];
            $occupation = $conta['0']['occupation'];
            $cpf = $conta['0']['CPF'];
            $address = $conta['0']['address'];
            $email = $conta['0']['email'];
            $phone = $conta['0']['phone'];
            $points = $conta['0']['score'];
            $photo = $conta['0']['photo'];
            $rg = $conta['0']['RG'];
            //var_dump($photo);
            echo "<div class='panel-body'>
              <div class='row'>
                <div class='col-md-3 col-lg-3' align='center'> <img alt='User Pic' src=../".$photo." class='img-circle img-responsive'> </div>
                
                <div class='col-md-9 col-lg-9'> 
                  <table class='table table-user-information'>
                    <tbody>
                      <tr>
                        <td>Nome:</td>  <td>".$name."</td>
                      </tr>
                      <tr>
                        <td>Data de Nascimento</td>   <td>".$birthday."</td>
                      </tr>
                      <tr>
                        <td>Ocupação</td>    <td>".$occupation."</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>CPF</td>   <td>".$cpf."</td>
                      </tr>
                        <tr>
                        <td>Endereço</td>   <td>".$address."</td>
                      </tr>
                      <tr>
                        <td>Email</td>    <td>".$email."</td>
                      </tr>
                        <td>Celular</td>   <td>".$phone."</td>
                      <tr>
                        <td>RG</td>    <td>".$rg."</td>
                      </tr>
                        </tr>
                        <td>Pontos</td>   <td>".$points."</td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href='#' class='btn btn-primary'>Meus Projetos</a>
                  <a href='minhasAdvertencias.php?id=".$id."' class='btn btn-primary'>Minhas Advertências</a>
                </div>
              </div>
            </div>";
            ?>
                 <!--<div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>-->
            
          </div>
        </div>
      </div>
    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../assets/js/jquery-3.2.1.js"></script>
<!-- <script src="assets/js/javascript.js"></script> -->
<script type="text/javascript" src="../assets/js/painel.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript"src="../assets/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>
</html>



