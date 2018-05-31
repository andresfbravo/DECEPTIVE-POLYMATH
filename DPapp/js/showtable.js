$(document).ready(function () {

    $("#mostrartodas").click(function (){
      console.log(document.getElementsByClassName('Tabla1')[0].style.display);
      console.log(document.getElementsByClassName('Tabla2')[0].style.display);
    document.getElementsByClassName('Tabla1')[0].style.display = 'none';
    document.getElementsByClassName('Tabla2')[0].style.display = 'block';
    });
    $("#mostrarusadas").click(function (){
    document.getElementsByClassName('Tabla1')[0].style.display = 'block';
    document.getElementsByClassName('Tabla2')[0].style.display = 'none';
    });
    $("#mostrarsug").click(function (){
    document.getElementsByClassName('Tabla3')[0].style.display = 'block';
    });
});
