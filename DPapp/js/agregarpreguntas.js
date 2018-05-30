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
            options = options + response;
            $("#textorespuesta").append(options);
          },
          error: function(response){
            var options = "";
            $("#textorespuesta").append(options);
          }
        });

    });
});
