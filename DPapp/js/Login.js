$(document).ready(function(){
  $("#login").click(function(){
    var username =$('#username').val();
    var password = $('#password').val();
    console.log(username, password);
    $.ajax({
      type:"POST",
      dataType :'json',
      url:'http://localhost/DPapp/classes/LoginAjax.php',
      data:{username:username, password:password},

      success:function(response){
        if(response.respuesta == true){
          $("#message").html(response.message);
        }else{
          $("#message").html(response.message);
        }
      }
    });
  });
});
