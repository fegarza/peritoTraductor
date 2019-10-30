<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perito Traductor</title>
    <link rel="stylesheet" href="src/css/normalize.css">
    <link rel="stylesheet" href="src/css/hk.css?v2">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
   <body>
   {if isset($msg)}
        {$msg}
    {/if} 
    <header>
        <div class="containter">
            <h1>CONTROL PANEL</h1>
        </div>
    </header>
    
        <div class="cont">
           <div class="containter">
                <div class="menu">
                    <div class="menu_cont">
                        <a href="/"> VOLVER AL INICIO </a>  
                    </div>
                </div>
                <div class="right">
                    <div class="mails">
                       <h1>Mensajes</h1>
                        <!--<div class="mail">
                           <h5>Asunto</h5>
                           <h5>Correo</h5>
                           <h5>Telefono</h5>
                           <h5>Fecha</h5>
                           <h5>Mensaje:</h5>
                            <p>Todo el contenido</p>
                            <a href="" target="_blank">VER ARCHIVO</a>
                        </div>-->
                        {$mails}
                        <div class="mail_next">
                           {for $foo=1 to $paginas}
                              <a href="?pag={$foo}">{$foo}</a>    
                           {/for}
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
</body></html>