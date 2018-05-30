$(document).ready(function () {
    $("#agregar").click(function (){
        var pregunta =$('#pregunta').val();
        $.ajax({
          type:"POST",
          dataType :'json',
          url:'http://localhost/deceptive-polymath/DPapp/agregarpreguntaquery.php',
          data:{pregunta:pregunta},
          success: function(response){
            var options = "";
            options = options + response+"\r\n\r\n";
            $("#textopregunta").append(options);
          },
          error: function(response){
            window.alert("ERROR");
            var options = "";
            $("#textorespuesta").append(options);
          }
        });

    });
});
