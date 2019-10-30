<?php
    require('./Nucleo/connection.php');
    require('./Nucleo/config.php');
    require './libs/Smarty.class.php';
    $smarty = new Smarty;
    $miConexion = new Conexion($host,$user,$password, $database);

?> 