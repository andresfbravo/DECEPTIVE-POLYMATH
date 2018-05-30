$(document).ready(function () {
    $("#tema").change(function (){
        var tema =$('#tema').val();
        $.ajax({
          type:"POST",
          dataType :'json',
          url:'http://localhost/deceptive-polymath/DPapp/preguntaquery.php',
          data:{tema:tema},
          success: function(response){
            var options = "<option value=\"\">Seleccione una pregunta...</option>";
            options = options + response;
            $("#pregunta").html(options);
          },
          error: function(response){
            var options = "<option value=\"\">Seleccione una pregunta...</option>";
            $("#pregunta").html(options);
          }
        });

    });
});
