    function editId(id){

        window.location= "http://localhost:8081/view/editarConta.php?editAdv="+id;
    }

    function deleteId(id){

    // $.ajax({
    //     url: 'http://localhost:8081/routes/routes.php',
    //     type: 'get',
    //     data:{deletarConta: id},
    //     success: function(){
    //     alert("Conta deletada com sucesso!");
    //         location.reload();
    //     }
    // });
     window.location= "http://localhost:8081/routes/routes.php?delAdv="+id;

  
    }
  $(document).ready(function () {

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
  