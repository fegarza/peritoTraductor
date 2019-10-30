<?php
/* Smarty version 3.1.33, created on 2019-06-25 22:47:23
  from 'C:\xampp\htdocs\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d12885b622382_69640871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dafa573992e092a94c4bdc34ec81a168509cd854' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\login.tpl',
      1 => 1561432836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d12885b622382_69640871 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="src/css/normalize.css">
    <link rel="stylesheet" href="src/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda:400,800&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }?>
    <div class="cont">
      
       <form action="/login.php" method="POST">
       <h1>LOGIN</h1>
        <input placeholder="Introduce tu email" type="email" name="email"/>
        <input placeholder="Introduce tu password" type="password" name="pw"/>
        <button type="submit">INICIAR SESION</button>
        </form>
    </div>
</body>
</html><?php }
}
