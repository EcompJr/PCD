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
	 
});

