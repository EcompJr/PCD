function editId(id){

    window.location= "editarAdv.php?editAdv="+id;
}

function deleteId(id){

    $.ajax({
        url: 'http://localhost:8080/routes/routes.php',
        type: 'get',
        data:{delAdv: id},
        success: function(){
        alert("Advertencia deletada com sucesso!");
            location.reload();
        }
    });
}
$(document).ready(function () {

    var tableAdvertences = "";
    var userId = document.getElementById("memberId").value;

    $.ajax({
        url: '../routes/routes.php',
        type: 'post',
        dataType: "json",
        data: {loadAdvs: 'advertences'},
        success: function(advertences) {

            //Laço para criar linhas da tabela Advertencias
            for(var i = 0; i<advertences.length; i++){
                if(advertences[i].memberId == userId){
                    tableAdvertences += "<tr>";
                    tableAdvertences += "<td>" + advertences[i].member + "</td>";
                    tableAdvertences += "<td>" + advertences[i].responsible + "</td>";
                    tableAdvertences += "<td>" + advertences[i].reason + "</td>";
                    tableAdvertences += "<td>" + advertences[i].data + "</td>";
                    tableAdvertences += "<td>" + advertences[i].points + "</td>";
                    tableAdvertences += "<td>" + advertences[i].dismissed + "</td>";
                    tableAdvertences += "<td><button id='btnEdit' type=\"button\"  class=\"botaoE btn-primary\" style=\"margin-right: 10px;\" onclick=\"editId("+advertences[i].id+")\"><span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></button><button id='btnDelete' type=\"button\"  class=\"botaoD btn-danger\" onclick=\"deleteId("+advertences[i].id+")\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></button></td>";
                    tableAdvertences += "</tr>";
                }
                //tableAdvertences += userId;
            }
            //Preencher a Tabela
            $("#tabelaAdvertencias tbody").html(tableAdvertences);
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
  