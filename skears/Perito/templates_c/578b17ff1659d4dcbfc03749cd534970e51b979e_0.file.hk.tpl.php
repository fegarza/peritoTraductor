<?php
/* Smarty version 3.1.33, created on 2019-07-02 21:35:47
  from 'C:\xampp\htdocs\templates\hk.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d1bb21341a122_24986101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '578b17ff1659d4dcbfc03749cd534970e51b979e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\hk.tpl',
      1 => 1562096141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d1bb21341a122_24986101 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perito Traductor</title>
    <link rel="stylesheet" href="src/css/normalize.css">
    <link rel="stylesheet" href="src/css/hk.css?v2">
    <?php echo '<script'; ?>
 src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"><?php echo '</script'; ?>
>
</head>
   <body>
   <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

    <?php }?> 
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
                        <?php echo $_smarty_tpl->tpl_vars['mails']->value;?>

                        <div class="mail_next">
                           <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['paginas']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['paginas']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>
                              <a href="?pag=<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</a>    
                           <?php }
}
?>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
</body></html><?php }
}
