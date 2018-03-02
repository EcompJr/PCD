$(document).ready(function () {

    /*  ==========================================
        Navbar effect
        ========================================== */
    (function ($) {
        $(document).ready(function () {

            // hide .navbar first
            $("nav").hide();

            // fade in .navbar
            $(function () {
                $(window).scroll(function () {

                    // set distance user needs to scroll before we start fadeIn
                    if ($(this).scrollTop() > 550) {
                        $('nav').fadeIn();
                    } else {
                        $('nav').fadeOut();
                    }
                });
            });

        });
    }(jQuery));

    /*  ==========================================
        Title appearing effect
        ========================================== */
    var appear = false;
    (function () {
        var node = document.getElementById('message'),
            message = "Programa de Controle Disciplinar";
            current = message.split("").reverse(),
            interval = setInterval(function () {
                if (current.length)
                    node.innerHTML += current.pop();
                else
                    clearInterval(interval);
                appear = true;
            }, 100);
    }());

    var appear2 = false;
    (function () {
        var node2 = document.getElementById('message2'),
            message2 = "O que é o Programa de Controle Disciplinar?";
            current2 = message2.split("").reverse(),
            interval2 = setInterval(function () {
                if (current2.length)
                    node2.innerHTML += current2.pop();
                else
                    clearInterval(interval2);
                appear2 = true;
            }, 100);
    });

    //$("#logo").hide();

    /*  ======================================
        Description fade in
        ====================================== */

    $("#txtheader").hide();
    $("h1").mouseenter(function () {
        if (appear) {
            //$("#txtheader").show().delay(200);          
            //Sem parâmetros: o efeito é executado em 400ms
            $("#txtheader").fadeIn();
            //Parâmetro com a duração em ms do efeito
            $("#txtheader").fadeIn(1000);
            //Parâmetro slow: o efeito é executado em 600ms
            $("#txtheader").fadeIn("slow");
            //Parâmetro fast: o efeito é executado em 200ms
            $("#txtheader").fadeIn("fast");
        }
    });

    /*  =====================================
        Soft scroll
        ==================================== */
    var $doc = $('html, body');
    $('.scrollSuave').click(function () {
        $doc.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });

    /* =====================================
        Modal windown
        ==================================== */

    $("a[rel=modal]").click(function (ev) {
        ev.preventDefault();

        var id = $(this).attr("href");

        var alturaTela = $(document).height();
        var larguraTela = $(window).width();

        $('#mascara').css({ 'width': larguraTela, 'height': alturaTela });

        $('#mascara').fadeIn(1000);
        $('#mascara').fadeTo("slow", 0.8);

        var left = ($(window).width() / 6) - ($(id).width() / 6);
        var top = ($(window).height() / 6) - ($(id).height() / 6);

        $(id).css({ 'top': top, 'left': left });
        $(id).show();
    });

    $("#mascara").click(function () {
        $(this).hide();
        $(".window").hide();
    });

    $('.fechar').click(function (ev) {
        ev.preventDefault();
        $("#mascara").hide();
        $(".window").hide();
    });

    // handle the mouseenter functionality
    $(".img").mouseenter(function () {
        $(this).addClass("hover");
    })
    // handle the mouseleave functionality
    $(".img").mouseleave(function () {
        $(this).removeClass("hover");
    });

    var contasAH = "";    
    $.ajax({
		url: '../routes/routes.php',
        type: 'post',
        dataType: "json",
        data: {loadContas: 'contas'},
        success: function(membros) {
            //Laço para criar linhas da tabela Advertencias
            var x = 1;
            for(var i = 0; i<membros.length; i++){
                contasAH += "<!-- Start Member --><div id=\"effect-1\" class=\"col-lg-4 col-sm-6 effects clearfix\"><div class=\"img img-memberIcon img-circle img-responsive\"><img class=\"memberIcon\" src=\"../assets/images/ecomp/membros/"+membros[i].login+".jpg\" width=\"200\" height=\"200\" alt=\"\"/>";
                contasAH += "<div class=\"overlay\"><a href=\"#window"+x+"\" data-toggle=\"modal\" class=\"expand pointsText\">"+membros[i].score+" PONTOS</a></div></div><div class=\"modal fade\" id=\"window"+x+"\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"window"+x+"\" aria-hidden=\"true\"><div class=\"modal-dialog modal-lg modal-lg\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><img class=\"img img-responsive img-companyLogo\" src=\"../assets/images/ecomp/logoNome.png\" width=\"200\" height=\"50\"></img><h1 id=\"insideWidow\" class=\"memberName text-right\"><i class=\"fa fa-user-o\" aria-hidden=\"true\"></i> "+membros[i].name+"<div id=\"insideWidow\" class=\"memberClassification text-right\">"+membros[i].occupation+"</div></h1></div><div class=\"modal-body\"><img class=\"img-memberWindow img img-rounded img-responsive\" src=\"../assets/images/ecomp/membros/"+membros[i].login+".jpg\" alt=\"\"></img><hr class=\"dark\">";
                contasAH += "<p class=\"text-center historicTitle\">HISTÓRICO</p><hr class=\"dark\"><div><p class=\"text-Window text-center\"><span class=\"numberPunition\">#1</span> <span class=\"topicPunition\">PERDEU</span> <span class=\"numberPunition\">XX</span> <span class=\"topicPunition\">PONTOS EM XX/XX/XXXX POR XXXXXXXXXX<br><span class=\"responsiblePunition\">RESPONSÁVEL:</span> XXXXXXXX</p><hr><p class=\"text-Window text-center\"><span class=\"numberPunition\">#2</span> <span class=\"topicPunition\">PERDEU</span> <span class=\"numberPunition\">XX</span> <span class=\"topicPunition\">PONTOS EM XX/XX/XXXX POR XXXXXXXXXX<br><span class=\"responsiblePunition\">RESPONSÁVEL:</span> XXXXXXXX</p><hr><p class=\"text-Window text-center\"><span class=\"numberPunition\">#3</span> <span class=\"topicPunition\">PERDEU</span> <span class=\"numberPunition\">XX</span> <span class=\"topicPunition\">PONTOS EM XX/XX/XXXX POR XXXXXXXXXX<br><span class=\"responsiblePunition\">RESPONSÁVEL:</span> XXXXXXXX</p><hr></div></div></div></div></div>";
                contasAH += "<h3 class=\"memberName\">"+membros[i].name+"<div class=\"memberClassification\">"+membros[i].occupation+"</div></h3></div>";
                x++;
            }
            //Preencher a div
            $("#rowAH").html(contasAH);
        }    
	});

    //Logout
	$("#logout").click(function(){
			
		$.ajax({
			url: '../routes/routes.php',
			type: 'get',
			data:{action:'logoff'},
			success: function(){
				alert("Deslogado com sucesso!");
				window.location= "../view/login.php?logout=true";
			}
		});
	});
});