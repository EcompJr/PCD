function updatePoints() {
    var x = document.getElementById("#qtdDias").value;
    document.getElementById("#points").innerHTML = x;
}

$(document).ready(function(){


    $('#inpDate').datepicker({
        format: 'dd/mm/yyyy',
        language:"pt-BR",
        //startDate: '+0', Apenas pode ser selecionado do dia atual em diante
        todayHighlight: true,
        autoclose: true
    });

	$("#qtdDias").attr('disabled', 'disabled');
	
	$("#motivo").change(function() {
		
		$("#qtdDias").attr('disabled', 'disabled');
		
 		if ($("#motivo option:selected").val() == "" ){

			$("#points").val("");
		}
 		else if ($("#motivo option:selected").val() == "motivo1" ){

			$("#points").val("4");

		}else if ($("#motivo option:selected").val() == "motivo2" ){

			$("#points").val("2");

		}else if ($("#motivo option:selected").val() == "motivo3" ){
			
			//ESCONDER O INPUT QTD DIAS QUANDO ESCOLHER OUTRA OPCAO
			
			// if (!($("#qtdDias").is(":visible")) ){
			// 	$("#motivo").append('<div class="row"><div class="input-field col s8"><input id="qtdDias" type="number" name="qtdDias" placeholder="Qtd dias" min="1" size="2"></div></div>');
			// }else{
			// 	$("#qtdDias").change(function() { 	
			// 		$("#points").val($("#qtdDias").val()*2);
			// 	});
			// }
			
			$("#qtdDias").removeAttr('disabled');
			$("#qtdDias").change(function() { 	
				$("#points").val($("#qtdDias").val()*2);
			})



		}else if ($("#motivo option:selected").val() == "motivo4" ){

			$("#points").val("2");

		}else if ($("#motivo option:selected").val() == "motivo5" ){

			$("#points").val("4");

		}else if ($("#motivo option:selected").val() == "motivo6" ){
				
			$("#points").val("10");
		}
	});
  		
	//Logout
	$("#logout").click(function(){
			
		$.ajax({
			url: 'http://localhost:8081/routes/routes.php',
			type: 'get',
			data:{action:'logoff'},
			success: function(){
				alert("Deslogado com sucesso!");
				window.location= "http://localhost:8081/view/login.php?logout=true";
			}
		});
	});

// 	 $("#regras").click(function(){

//         window.location= "http://localhost:8081/view/regras.php";
//     });

//     $("#advBTN").click(function(){

//       window.location= "http://localhost:8081/view/advertencias.php";
//   });

//   $("#contasBTN").click(function(){

//       window.location= "http://localhost:8080/view/gerenciarContas.php";
//   });
	 
});

