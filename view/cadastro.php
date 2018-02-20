
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro PCD</title>

	<script type="text/javascript" src="../assets/js/jquery-3.2.1.js"></script>
	<!-- <script src="../assets/js/javascript.js"></script> -->
	<script type="text/javascript" src="../assets/js/painel.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript"src="../assets/js/bootstrap-datepicker.pt-BR.min.js"></script>

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
	?>
	<div class="container-fluid">
	<div class="row">
		<div id="divConteudo" class="container col-md-offset-2 col-md-8">
			<h4 class="text-justify">Cadastro</h4>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<form id="cad" action="../routes/routes.php" method="POST" name="formCad">
							
							<div class="row">
								<div class="col-md-12 form-group" id="cargo">
								<label for="idMotivo">Cargo</label>
									<select required id="selectCargo" class="form-control" name="selectCargo">
										<option value="" disabled selected>Escolha uma das opções</option>	
										<option value="Conselheiro">Conselheiro</option>
										<option value="Diretor">Diretor</option>
										<option value="Membro">Membro</option>
										<option value="Trainee">Trainee</option>
									</select>
									
								</div>
							</div>

							<div class="row">		
								<div id="nome" class="col-md-12 form-group">
								<label for="nome">Nome</label>
									<input id="nome" class="form-control" type="text" name="nomeCad">
								</div>
							</div>

							<div class="row">		
								<div id="login" class="col-md-12 form-group">
								<label for="login">Login</label>
									<input id="login" class="form-control" type="text" name="loginCad">
								</div>
							</div>

							<div class="row">		
								<div id="senha" class="col-md-12 form-group">
								<label for="senha">Senha</label>
									<input id="senha" class="form-control" type="password" name="senhaCad">
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-md-3 form-group">
									<button id="registerBTN" type="submit" class="btn btn-primary"  name="register">Submit <i class="fa fa-send"></i></button>
								</div>		
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

