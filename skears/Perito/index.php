<?php
    require_once('./Nucleo/global.php');

    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];
        $cont  = "";
        if($msg == "1"){
            $cont = "<script type=\"text/javascript\">swal(\"¡Listo!\", \"Tu mensaje ha sido enviado\", \"success\");</script>";
           
        }
        else if($msg == "2"){
            $cont = "<script type=\"text/javascript\">swal(\"Error\", \"Tu correo electrónico no es valido\", \"error\");</script>";
            $smarty->assign('alert', $cont);
        }
        else if($msg == "3"){
            $cont = "<script type=\"text/javascript\">swal(\"Error\", \"Tu correo teléfono no es valido\", \"error\");</script>";
            $smarty->assign('alert', $cont);
        }
        else if($msg == "4"){
            $cont = "<script type=\"text/javascript\">swal(\"Error\", \"Tu archivo pesa demaciado\", \"error\");</script>";
            $smarty->assign('alert', $cont);
        }
        else if($msg == "5"){
            $cont = "<script type=\"text/javascript\">swal(\"Error\", \"Nos se pudo enviar tu mensaje\", \"error\");</script>";
            $smarty->assign('alert', $cont);
        }
        $smarty->assign('alert', $cont);
    }
    $smarty->display('./templates/index.tpl');
?>
