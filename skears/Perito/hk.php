<?php
require_once('./Nucleo/global.php');
session_start();
 if(isset($_SESSION["user"])){

  if(isset($_POST["eliminar"])){
    $ID = $_POST["eliminar"];
    if($miConexion->BorrarMail($ID)){
      $smarty->assign("msg","<script type=\"text/javascript\">swal(\"¡Listo!\", \"Se ha eliminado el mensaje correctamente\", \"success\");</script>");
    }
    else{
      $smarty->assign("msg","<script type=\"text/javascript\">swal(\"¡Error!\", \"Ha ocurrido un error\", \"error\");</script>");
    }
  }


  if(isset($_GET["pag"])){
    $smarty->assign('mails',$miConexion->MostrarMailsPorPagina($_GET["pag"], 15));
    $smarty->assign('paginas',$miConexion->ContarPaginas(15));
    $smarty->display('./templates/hk.tpl');
  }else{
 
   $smarty->assign('mails',$miConexion->MostrarMailsPorPagina("1",15));
   $smarty->assign('paginas',$miConexion->ContarPaginas(15));
   $smarty->display('./templates/hk.tpl');
  }
}else{
 header('Location: /login.php');
}



?>