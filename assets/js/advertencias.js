    function editId(id){

        window.location= "http://localhost:8081/view/editarAdv.php?editAdv="+id;
    }

    function deleteId(id){

      $.ajax({
          url: 'http://localhost:8081/routes/routes.php',
          type: 'get',
          data:{delAdv: id},
          success: function(){
          alert("Advertencia deletada com sucesso!");
              location.reload();
          }
      });
      //window.location= "http://localhost:8081/routes/routes.php?delAdv="+id;

  
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
  