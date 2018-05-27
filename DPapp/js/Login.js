$(document).ready(function(){
  $("#login").click(function(){
    var username =$('#username').val();
    var password = $('#password').val();
    console.log(username);
    $.ajax({
      type:"POST",
      dataType :'json',
      url:'/classes/LoginAjax.php',
      data:{Username:username, Password:password},

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
