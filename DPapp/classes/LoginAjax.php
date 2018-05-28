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
            $_SESSION['tipo_usuario'] = $user[0][1];
            $_SESSION['password'] = $user[0][7];
            $_SESSION['login'] = true;
            #print_r($user);
            $errormessage = "Inicio de Sesión exitoso.";
            /*
            if($_SESSION['tipo_usuario'] == "Administrador"):
              echo "Administrador";
            elseif($_SESSION['tipo_usuario'] == "Profesor"):
              echo "Profesor";
            elseif($_SESSION['tipo_usuario'] == "Estudiante"):
              echo "Estudiante";
            else:
              echo "Error";
            endif;
            */
           $Jsonout = array('respuesta'=> $okmessage, 'mensaje'=> $errormessage, 'tipo_usuario' => $_SESSION['tipo_usuario']);
          else:
             $Jsonout = array('respuesta'=> $okmessage, 'mensaje'=> $errormessage, 'tipo_usuario' => null);
            $errormessage = 'Usuario o Contraseña incorrecta.';
          endif;
        else:
           $Jsonout = array('respuesta'=> $okmessage, 'mensaje'=> $errormessage, 'tipo_usuario' => null);
          $errormessage = 'Contraseña incorrecta.';
        endif;
      else:
         $Jsonout = array('respuesta'=> $okmessage, 'mensaje'=> $errormessage, 'tipo_usuario' => null);
          $errormessage = 'Todos los datos son requeridos.';
      endif;
  
    else:
      echo ("AQUI");
       $Jsonout = array('respuesta'=> $okmessage, 'mensaje'=> $errormessage, 'tipo_usuario' => null);
    endif;

   
    echo json_encode($Jsonout);

?>
