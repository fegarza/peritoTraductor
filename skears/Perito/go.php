<?php

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

if( isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["content"]) && isset($_POST["title"]) ){

    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $title = $_POST["title"];
    $content = trim($_POST["content"]);
    $content = str_replace("\n", '<br />', $content);


    if(strlen($_POST["email"]) > 3 && strlen($_POST["phone"]) >= 5){

        require('./Nucleo/connection.php');
        require('./Nucleo/config.php');
        $miConexion = new Conexion($host,$user,$password, $database);
       

 

        if(isset($_FILES["document"])){
            
            if ($_FILES['document']['size'] < 5*MB){
                $path = $_FILES['document']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $miConexion->InsertarMail($email,$phone,$content, $title);
                copy($_FILES["document"]["tmp_name"], "./files/". $miConexion->InsertarFile($ext) .".". $ext);
                header('Location: /index.php?msg=1');
            }else{
                header('Location: /index.php?msg=4');
            }
        }else{
            
            $miConexion->InsertarMail($email,$phone,$content, $title);
            header('Location: /index.php?msg=1');
        }

    }else{
      if(!strlen($_POST["email"]) > 3){
        header('Location: /index.php?msg=2');
        } if(!strlen($_POST["phone"]) >= 5){
            header('Location: /index.php?msg=3');
        }
        header('Location: /index.php?msg=5');
    }
}else{
    header('Location: /index.php');
}
?>