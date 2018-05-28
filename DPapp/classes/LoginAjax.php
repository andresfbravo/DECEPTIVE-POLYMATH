<?php
    require_once 'connection.php';
    $connection = new Connection();
    $okmessage = false;
    $errormessage = 'I dunno';

    if(isset($_POST['username'],$_POST['password'])):
      if($_POST['username']!=""):
        if($_POST['password']!=""):
          $username = $_POST['username'];
          $password = $_POST['password'];

          $query = $connection->getConnection()->prepare("SELECT * FROM \"Usuario\" WHERE \"Cedula\" = $username and \"Password\" = '$password'");
          $query->execute();
          if($query->rowCount()>0):
            $okmessage = true;
            $user = $query->fetchAll();
            session_start();
            $_SESSION['username'] = $user[0][0];
            $_SESSION['password'] = $user[0][7];
            $errormessage = "Inicio de Sesión exitoso.";
          else:
            $errormessage = 'Usuario o Contraseña incorrecta.';
          endif;
        else:
          $errormessage = 'Contraseña incorrecta.';
        endif;
      else:
          $errormessage = 'Todos los datos son requeridos.';
      endif;

    endif;
    $Jsonout = array('respuesta'=> $okmessage, 'mensaje'=> $errormessage);
    echo json_encode($Jsonout);
?>
