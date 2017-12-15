
<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Advertências</title>

	<script type="text/javascript" src="assets/js/jquery-3.2.1.js"></script>
	<!-- <script src="assets/js/javascript.js"></script> -->
	<script type="text/javascript" src="assets/js/painel.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript"src="assets/js/bootstrap-datepicker.pt-BR.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="assets/css/bootstrap-datepicker.css" rel="stylesheet">
	
    <!-- Icon -->
	<link rel="icon" href="assets/images/ecomp/logo.png"> 

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
				<img src="assets/images/ecomp/logo.png" width="30">
				</a>
				<!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>-->
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-painel" id="bs-example-navbar-collapse-1">
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
	<div class="container-fluid">
		<div class="row painel-content">
			<div id="divConteudo" class="container col-md-offset-1 col-md-10">
				<h4 class="text-justify">Adicionar advertências</h4>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<form id="advert" action="../routes/routes.php" method="POST" name="formAdv">
								
								<div class="row">
									<div class="col-md-12 form-group" id="motivo">
									<label for="idMotivo">Motivo</label>
										<select id="selectMotivo" class="form-control" name="selectMotivo">
											<option value="" disabled selected>Escolha uma das opções</option>	
											<option value="motivo1">Ausência em Reunião</option>
											<option value="motivo2">Atraso em Reuniões</option>
											<option value="motivo3">Ausência ou atraso nas atividades</option>
											<option value="motivo4">Ausência de resposta dos comunicados</option>
											<option value="motivo5">Ausência na sede no horário acordado</option>
											<option value="motivo6">Atitudes negativas</option>
										</select>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<input id="qtdDias" class="form-control" type="number" name="qtdDias" title="Disponível apenas para o 3º motivo." placeholder="Quantidade de dias" min="1" size="2">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<label for="inpDate">Data</label>
										<div class="input-group date">
											<input id="inpDate" type="text" class="form-control">
											<div class="input-group-addon">
												<span class="glyphicon glyphicon-th"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">		
									<div id="pont" class="col-md-12 form-group">
										<label>Pontos</label>
										<br>
										<input id="points" class="form-control" type="" name="pontos" title="Preenchido com base no motivo escolhido." readonly="readonly" value=" ">
									</div>
								</div>

								<div class="row">		
									<div id="membro" class="col-md-12 form-group">
									<label for="membro">Penalizado</label>
										<input id="membro" class="form-control" type="text" name="membro">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
									<label for="resp">Responsável</label>
										<input id="resp" class="form-control" type="text" name="responsavel" title="Preenchido com base no banco de dados." readonly="readonly" value="<?php isset($_SESSION['nome']) ? print $_SESSION['nome'] : false; ?>">
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-2 form-group">
										<label>Indeferida</label>
										<select id="idIndef" class="form-control" name="selectIndef">
											<option value="0" selected>Não</option>
											<option value="1" >Sim</option>
										</select>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 form-group">
										<button id="envAdv" type="submit" class="btn btn-primary"  name="envAdv">Submit <i class="fa fa-send"></i></button>
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

