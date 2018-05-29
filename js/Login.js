$(document).ready(function(){
  $("#login").click(function(){
    var username =$('#username').val();
    var password = $('#password').val();
    //console.log(username, password);

    $.ajax({
      type:"POST",
      dataType :'json',
      url:'http://localhost/deceptive-polymath/DPapp/classes/LoginAjax.php',
      data:{username:username, password:password},
      success: function(response){
        if(response.respuesta == true){
          if(response.tipo_usuario=="Administrador"){
            window.location.href = 'http://localhost/deceptive-polymath/DPapp/vistasUsuarios/Vistaadministrador.php';
          }else if(response.tipo_usuario == "Profesor"){  
            window.location.href = 'http://localhost/deceptive-polymath/DPapp/vistasUsuarios/Vistaprofesor.php';
          }
          else if(response.tipo_usuario == "Estudiante"){
            window.location.href = 'http://localhost/deceptive-polymath/DPapp/vistasUsuarios/Vistaestudiante.php';
          }
        }
      },
      error: function(response){
        console.log("Error");
        window.alert(response.mensaje);
      }
    });
  });
});
