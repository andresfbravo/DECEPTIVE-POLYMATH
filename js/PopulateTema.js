$(document).ready(function () {
    $("#materia").change(function (){
        var materia =$('#materia').val();
        $.ajax({
          type:"POST",
          dataType :'json',
          url:'http://localhost/deceptive-polymath/DPapp/temaquery.php',
          data:{materia:materia},
          success: function(response){
            var options = "<option value=\"\">Seleccione un tema...</option>";
            options = options + response;
            $("#tema").html(options);
          },
          error: function(response){
            var options = "<option value=\"\">Seleccione un tema...</option>";
            $("#tema").html(options);
          }
        });

    });
});
