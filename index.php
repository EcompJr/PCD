<!DOCTYPE html>
<html>

<head>
    <title>PCD - ECOMP Jr.</title>
    <meta charset="UTF-8">    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="assets/js/jquery-3.2.1.js"></script>
    <script src="assets/js/javascript.js"></script>

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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll scrollSuave" href="#about">Sobre</a>
                    </li>
                    <li>
                        <a class="page-scroll scrollSuave" href="#rules">Regras</a>
                    </li>
                    <li>
                        <a class="page-scroll scrollSuave" href="/Views/pcd.php">Membros</a>
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
                <p id="txtheader">Programa de Controle Disciplinar, também conhecido como PCD, aplicado na Empresa Júnior de Engenharia de Computação.</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll scrollSuave">Descubra</a>

            </div>
        </div>
    </header>

    <section class="bg-blue" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 id = "message2" class ="title"></h2>
                    <hr class="light">
                    <br>
                    <p class="text-faded">O programa de controle disciplinar tem o objetivo de alertar e fiscalizar comportamentos que de certa
                        maneira podem influenciar negativamente o desenvolvimento da empresa e do membro, a fim de melhorar
                        seu desempenho profissional e a responsabilidade do mesmo para com a empresa.</p>

                    <p class="text-faded">Cada membro terá direito a 20 pontos que serão renovados todo início de ano (1 de janeiro), cada infração
                        que o mesmo tiver será reduzido do seu valor total, até que este membro não possua mais pontos e
                        assim haja a possibilidade do seu desligamento como membro efetivo da empresa, após determinação
                        de uma assembleia.</p>

                    <p class="text-faded">O membro será notificado através de email ou reunião presencial de suas infrações para que assim ele
                        perceba seu comportamento inadequado em determinadas situações. O membro após notificado terá direito
                        à defesa, desde que seja enviado um email em um prazo de 7 (sete) dias com a defesa bem fundamentada,
                        podendo esta ser aceita ou indeferida.</p>
                    <br>
                    <hr class="light">
                    <br>
                    <a href="#rules" class="page-scroll btn btn-default btn-xl sr-button scrollSuave">Entenda as regras</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray bgRight col-md-12" id="rules">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>O que pode ocasionar a perda de pontos?</h2>
                        <hr class="dark">
                        <br>
                        
                        <div class="blue">
                            <ol>
                                <a href="#janela1" rel="modal"><h4>Ausência nas reuniões</h4></a>
                                <a href="#janela2" rel="modal"><h4>Por atraso nas reuniões ao qual foi solicitado</h4></a>
                                <a href="#janela3" rel="modal"><h4>Ausência ou atraso nas atividades para os quais forem designados</h4></a>
                                <a href="#janela4" rel="modal"><h4>​Ausência de resposta dos comunicados internos</h4></a>
                                <a href="#janela5" rel="modal"><h4>Ausência na sede no horário acordado</h4></a>
                                <a href="#janela6" rel="modal"><h4>Atitudes que possam denegrir a imagem, ofender a dignidade ou conter
                                    preconceito de natureza pejorativa</h4></a>
                            </ol>
                        </div>
                    
                    <div class="window" id="janela1">
                        <a href="#" class="fechar">X Fechar</a>
                        <h3>Ausência nas reuniões</h3>
                        <p>Faltar alguma reunião que foi marcada com pelo menos 72 horas (3 dias) de
                             antecedência sem nenhuma justificativa plausível.</p>
                        <p><b>Obs.1</b> Entende-se como justificativa plausível: motivos médicos (desde que 
                            apresentado atestado), aula extra marcada por professor no horário da reunião.</p>
                        <p><b>Obs.2</b> ​As reuniões não poderão ser marcadas em horários que indique 
                                impossibilidade devido à aulas ou reuniões de iniciação científica.</p>
                        <p><b>Penalidade: 4 pontos.</b></p>
                    </div>

                    <div class="window" id="janela2">
                        <a href="#" class="fechar">X Fechar</a>
                        <h3>Por atraso nas reuniões ao qual foi solicitado</h3>
                        <p>Atrasar por mais de 15 minutos em alguma reunião que foi marcada com pelo 
                            menos 72 horas (3 dias) sem aviso prévio justificando o atraso.</p>
                        <p><b>Obs.1</b> O atraso deverá ser justificado com pelo menos 12 horas de 
                                antecedência.</p>
                        <p><b>Obs.2</b>​Após 20 minutos caso o membro não tenha chegado, será tratado 
                                como ausência em reunião.</p>
                        <p><b>Obs.3</b>​​Imprevistos podem ser considerados como justificativa caso a outra 
                                parte afetada aceite-a.</p>
                        <p><b>Penalidade: 2 pontos.</b></p>
                    </div>

                    <div class="window" id="janela3">
                        <a href="#" class="fechar">X Fechar</a>
                        <h3>Ausência ou atraso nas atividades para os quais forem designados</h3>
                        <p>Atrasar ou não entregar pontualmente alguma meta de projeto que lhe tenha 
                            sido passada sem justificativa aceitável.</p>
                        <p><b>Obs.1</b>Entende-se como justificativa aceitável algum fator externo que de certa 
                            forma pode ter contribuído para o atraso na entrega, como por exemplo a 
                            disponibilidade de algum serviço de terceiros (e.g. servidor fora do ar) ou motivos de 
                            doença (desde que apresentado atestado que corresponda a pelo menos 1⁄3 do prazo 
                            que foi dado para resolução da meta). Outros motivos poderão também ser incluídos, 
                            desde que conversados e acordados com o Diretor de Projetos e/ou de Recursos Humanos.</p>
                        <p><b>Obs.2</b> ​​A cada dia de atraso são perdidos 2 pontos até um total de 3 dias de 
                            atraso, situação na qual é considerada ausência da atividade e a tarefa deverá ser remanejada.</p>
                        <p><b>Penalidade: 2 pontos por dia de atraso.</b></p>
                    </div>

                    <div class="window" id="janela4">
                        <a href="#" class="fechar">X Fechar</a>
                        <h3>​Ausência de resposta dos comunicados internos</h3>
                        <p>Presumem-se lidas as correspondências eletrônicas em um prazo de 48 horas, 
                            assim o membro terá até este prazo para resposta de emails (quando necessário).</p>
                        <p><b>Obs.1</b> Alguns emails poderão receber prazo maior, desde que explicitados os 
                            seus prazos no corpo do texto. Caso o membro não possa responder por algum 
                            motivo, este motivo deverá ser expresso <b>antes da finalização do prazo de resposta 
                            do email, sinalizando a falta de resposta​.</b></p>
                        <p><b>Penalidade: 2 pontos.</b></p>
                    </div>

                     <div class="window" id="janela5">
                        <a href="#" class="fechar">X Fechar</a>
                        <h3>​Ausência na sede no horário acordado</h3>
                        <p>O membro poderá faltar no seu horário por motivos pessoais desde que não 
                            seja recorrente (2 vezes em 2 semanas) e estas faltas deverão ser sinalizadas com 
                            pelo menos 12 horas de antecedência para o diretor de recursos humanos.</p>
                        <p><b>Obs.1</b> O membro que precise faltar mais do que 1 vez em um período de 15 
                            dias deverá apresentar justificativa plausível (e.g. atestado médico, aula extra e entre 
                            outros).</b></p>
                        <p><b>Penalidade: 4 pontos.</b></p>
                    </div>

                    <div class="window" id="janela6">
                        <a href="#" class="fechar">X Fechar</a>
                        <h3>​Atitudes que possam denegrir a imagem, ofender a dignidade ou conter 
                            preconceito de natureza pejorativa</h3>
                        <p>O membro será punido caso haja de maneira desrespeitosa com outro membro 
                            durante encontros (reunião, integração, assembleias) fazendo algum comentário 
                            impróprio/inadequado.</p>
                        <p><b>Obs.1</b> O membro que se sentir ofendido de certa maneira deverá reportar o 
                            acontecido ao diretor de recursos humanos, para que assim os dois lados sejam 
                            ouvidos e as devidas providências sejam tomadas.</b></p>
                        <p><b>Penalidade: 10 pontos.</b></p>
                    </div>
 
                    <!-- mascara para cobrir o site -->  
                    <div id="mascara"></div>

                        <br>
                        <hr class="dark">
                        <br>
                        <a href="pcd.html" class="page-scroll btn btn-primary btn-xl sr-button scrollSuave">Conheça os Membros</a>
                    </div>
                </div>
            </div>
    </section>
</body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

</html>