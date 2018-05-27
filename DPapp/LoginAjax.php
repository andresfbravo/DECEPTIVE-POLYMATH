<?php
    require_once 'conexion.php';
    $connection = new Connection();
    $okmessage = false;
    $errormessage = 'I dunno';
    echo"HI";
    if(isset($_POST['username'],$_POST['password'])):
      if($_POST['username']!=""):
        if($_POST['password']!=""):
          $username = $_POST['username'];
          $password = $_POST['password'];

          $query = $connection->getConnection()->prepare("SELECT * FROM \"Usuario\" WHERE 'Cedula' = $username and 'Password' = $password");
          $query->execute();
          if($query->rowCount()>0):
            $okmessage = true;
            $user = $query->fetchAll();
            session_start();
            $_SESSION['username'] = $user[1];
          else:
            $errormessage = 'Usuario o Contraseña incorrecta.'
          endif;
        else:
          $errormessage = 'Contraseña incorrecta.';
        endif;
      endif;
      $errormessage = 'Todos los datos son requeridos.'
    endif;
    $Jsonout = array('respuesta'=> $okmessage, 'mensaje'0> $errormessage);
    echo json_encode($Jsonout);
?>
