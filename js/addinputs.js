function addfields(elem) {
    // use one of possible conditions
    // if (elem.value == 'Other')
  switch (elem.value) {
    case "Administrador":
        document.getElementById("phone").setAttribute("required", "true");
        document.getElementById("progacadem").setAttribute("required", "false");
        document.getElementById("asignatura").setAttribute("required", "false");
        document.getElementById("phone").disabled = false;
        document.getElementById("progacadem").disabled = true;
        document.getElementById("asignatura").disabled = true;
        document.getElementsByClassName('admininfo')[0].style.display = 'block';
        document.getElementsByClassName('estudinfo')[0].style.display = 'none';
        document.getElementsByClassName('profinfo')[0].style.display = 'none';
        console.log(document.getElementById("phone"));
      break;
    case "Profesor":
        document.getElementById("phone").setAttribute("required", "false");
        document.getElementById("progacadem").setAttribute("required", "false");
        document.getElementById("asignatura").setAttribute("required", "true");
        document.getElementById("phone").disabled = true;
        document.getElementById("progacadem").disabled = true;
        document.getElementById("asignatura").disabled = false;
        document.getElementsByClassName('admininfo')[0].style.display = 'none';
        document.getElementsByClassName('estudinfo')[0].style.display = 'none';
        document.getElementsByClassName('profinfo')[0].style.display = 'block';
      break;
    case "Estudiante":
        document.getElementById("phone").setAttribute("required", "false");
        document.getElementById("progacadem").setAttribute("required", "true");
        document.getElementById("asignatura").setAttribute("required", "false");
        document.getElementsByClassName('admininfo')[0].style.display = 'none';
        document.getElementsByClassName('estudinfo')[0].style.display = 'block';
        document.getElementsByClassName('profinfo')[0].style.display = 'none';
        document.getElementById("phone").disabled = true;
        document.getElementById("progacadem").disabled = false;
        document.getElementById("asignatura").disabled = true;
      break;
    default:
        document.getElementById("phone").setAttribute("required", "false");
        document.getElementById("progacadem").setAttribute("required", "false");
        document.getElementById("asignatura").setAttribute("required", "false");
        document.getElementsByClassName('admininfo')[0].style.display = 'none';
        document.getElementsByClassName('estudinfo')[0].style.display = 'none';
        document.getElementsByClassName('profinfo')[0].style.display = 'none';
        document.getElementById("phone").disabled = true;
        document.getElementById("progacadem").disabled = true;
        document.getElementById("asignatura").disabled = true;
      break;
  }
}
