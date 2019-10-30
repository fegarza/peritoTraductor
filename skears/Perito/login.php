<?php
require_once('./Nucleo/global.php');
session_start();
if(isset($_SESSION["user"])){
    header('Location: /hk.php');
}else{
    if(isset($_POST["email"]) && isset($_POST["pw"])){
        $email = $_POST["email"];
        $pw = $_POST["pw"];
        if($miConexion->BuscarUsuario($email, $pw) >= 1){
            
            $_SESSION["user"] = "Admin";
            header('Location: /hk.php');
        }else{
            $smarty->assign('error',"<h1 class='error'>No existe tal usuario</h1>");
            $smarty->display('./templates/login.tpl');
        }
    }else{
        $smarty->display('./templates/login.tpl');
    }
}



?>