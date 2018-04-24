function editId(id){

    window.location= "http://localhost:8080/view/editarAdv.php?editAccount="+id;
}

function deleteId(id){

  $.ajax({
      url: 'http://localhost:8081/routes/routes.php',
      type: 'get',
      data:{delAcc: id},
      success: function(){
      alert("Conta deletada com sucesso!");
          location.reload();
      }
  });
}

$(document).ready(function(){

	var tableAccounts = "";    
    $.ajax({
        url: '../routes/routes.php',
        type: 'post',
        dataType: "json",
        data: {loadContas: 'contas'},
        success: function(contas) {

            //Laço para criar linhas da tabela
            for(var i = 0; i<contas.length; i++){
                tableAccounts += "<tr>";
                tableAccounts += "<td>" + contas[i].login + "</td>";
                tableAccounts += "<td>" + contas[i].name + "</td>";
                tableAccounts += "<td>" + contas[i].occupation + "</td>";
                tableAccounts += "<td><button id='btnEdit' type=\"button\" class=\"botaoE btn-primary\" style=\"margin-right: 10px;\" onclick=\"editId("+contas[i].id+")\"><span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></button><button id='btnDelete' type=\"button\"  class=\"botaoD btn-danger\" onclick=\"deleteId("+contas[i].id+")\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></button></td>";
                tableAccounts += "</tr>";
            }
            //Preencher a Tabela
            $("#tabelaContas tbody").html(tableAccounts);
            $(".table").DataTable(); 
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

