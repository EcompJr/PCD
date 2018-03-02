$(document).ready(function(){

	var selectPenalizado = "";    
    $.ajax({
		url: '../routes/routes.php',
        type: 'post',
        dataType: "json",
        data: {loadContas: 'contas'},
        success: function(membros) {
			selectPenalizado += "<option value='' disabled selected>Escolha um membro</option>";
            //Laço para criar linhas da tabela Advertencias
            for(var i = 0; i<membros.length; i++){
				selectPenalizado += "<option value="+membros[i].id+">"+membros[i].name+"</option>";
            }
            //Preencher a Tabela
            $("#selectMembros").html(selectPenalizado);
        }    
	});
	
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

