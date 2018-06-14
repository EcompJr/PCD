<?php
    session_start();
    // //verifica se esta logado
    // if (!isset($_SESSION['auth'])) {
    //     header("location:/view/login.php?valid=false");
    // }
    //Verica o cargo do usuario, para exibir botao de gerenciar na navbar
    //caso este seja administrador
    if(!isset($_SESSION['auth'])){
        echo "not logged";
    }
    $adm = null;
    if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo']=="Diretor" || $_SESSION['cargo']=="Conselheiro"){
            $adm = true;            
        }else{
            $adm = false;       
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Conta - PCD</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">


	<link href="../assets/css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	
	
    <!-- Icon -->
	<link rel="icon" href="../assets/images/ecomp/logo.png"> 

</head>
<body>
	<?php
        require_once 'navbarAdm.php';
        require_once '../controller/MembrosController.class.php';
	?>
	<div class="container-fluid">
	<div class="row">
		<div id="divConteudo" class="container col-md-offset-2 col-md-8">
			<h4 class="text-justify">Cadastro</h4>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">

                        <?php
                            $idAcc = $_GET['editAccount'];
                            $conta = MembrosController::getContaById($idAcc);
                            $login = $conta['0']['login'];
                            $password = $conta['0']['password'];
                            $name = $conta['0']['name'];
                            $occupation = $conta['0']['occupation'];
							$endereco = $conta['0']['address'];
							$genero = $conta['0']['gender'];
							$email = $conta['0']['email'];
							$telefone = $conta['0']['phone'];
							$github = $conta['0']['github'];
							$aniversario = $conta['0']['birthday'];
							$foto = $conta['0']['photo'];

						echo "<form id='cad' action='../routes/routes.php' method='POST' name='formCad'>
							
						<div class='row'>

						<div id='nome' class='col-md-12 form-group'>
							<input id='Id' class='form-control' type='hidden' name='Id' value='$idAcc'>
						</div>

						<div id='nome' class='col-md-12 form-group'>
						<label for='nome'>Nome</label>
							<input id='nome' class='form-control' type='text' name='nomeCad' value='$name'>
						</div>
						
						<div class='col-md-12 form-group' id='cargo'>
							<label for='idMotivo'>Cargo</label>
								<select required id='selectCargo' class='form-control' name='selectCargo'>
									<option value='' disabled selected>".$occupation."</option>	
									<option value='Conselheiro'>Conselheiro</option>
									<option value='Diretor'>Diretor</option>
									<option value='Membro'>Membro</option>
									<option value='Trainee'>Trainee</option>
								</select>
						</div>
							


						<div id='login' class='col-md-12 form-group'>
							<label for='login'>Login</label>
								<input id='login' class='form-control' type='text' name='loginCad' value='$login'>
						</div>
						

						<div id='senha' class='col-md-12 form-group'>
							<label for='senha'>Senha</label>
								<input id='senha' class='form-control' type='password' name='senhaCad' value='$password>
						</div>
						
						<div id='endereco' class='col-md-12 form-group'>
							<label for='endereco'>Endereço</label>
								<input id='endereco' class='form-control' type='text' name='nomeCad' value='$endereco'>
						</div>
						

						<div id='foto' class='col-md-12 form-group'>
							<label for='foto'>Foto</label>
								<input id='foto' class='form-control' type='text' name='nomeCad' value='$foto'>
						</div>
							
						<div id='aniversario' class='col-md-12 form-group'>
							<label for='aniversario'>Aniversario</label>
								<input id='aniversario' class='form-control' type='text' name='nomeCad' value='$aniversario'>
						</div>
						
						<div id='email' class='col-md-12 form-group'>
							<label for='email'>Email</label>
								<input id='email' class='form-control' type='email' name='nomeCad' value='$email'>
						</div>
						
						<div id='telefone' class='col-md-12 form-group'>
							<label for='telefone'>Telefone</label>
								<input id='telefone' class='form-control' type='tel' name='nomeCad' value='$telefone'>
						</div>
						

						<div id='github' class='col-md-12 form-group'>
							<label for='github'>Github</label>
								<input id='github' class='form-control' type='text' name='nomeCad' value='$github'>
						</div>
						
						<div id='genero' class='col-md-12 form-group'>
							<label for='genero'>Genero</label>
								<input id='genero' class='form-control' type='text' name='nomeCad' value='$genero'>
						</div>
						
						<div class='col-md-3 form-group'>
							<button id='registerBTN' type='submit' class='btn btn-primary'  name='editConta'>Submit <i class='fa fa-send'></i></button>
						</div>		
						
						
						</div>
							
						</form>";
                        ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="../assets/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../assets/js/painel.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript"src="../assets/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
crossorigin="anonymous"></script>
</body>
</html>

