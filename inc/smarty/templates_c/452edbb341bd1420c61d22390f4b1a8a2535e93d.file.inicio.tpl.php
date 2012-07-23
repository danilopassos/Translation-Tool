<?php /* Smarty version Smarty-3.1.10, created on 2012-07-22 20:00:32
         compiled from "view/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21440614114ff76b9f2bf6d5-56569461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '452edbb341bd1420c61d22390f4b1a8a2535e93d' => 
    array (
      0 => 'view/inicio.tpl',
      1 => 1342998003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21440614114ff76b9f2bf6d5-56569461',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ff76b9f2d0d87_14787290',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff76b9f2d0d87_14787290')) {function content_4ff76b9f2d0d87_14787290($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <title>Portal Tradução .: The Legend of Zelda: Skyward Sword :.  pt_BR </title>
    <link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
    <div id="header" >

        <table style="background-color: white;">
            <tr>
                <td><a href="index.php"><img src="style/img/logo.jpg" alt="logo zelda-ss"/></a></td>
                <td><h1>.: The Legend of Zelda: Skyward Sword :.  pt_BR</h1></td>
            </tr>
        </table>
<hr>
<a href="index.php"> [ index ] </a> |
<a href="traduzir.php"> [ traduzir ] </a> |
<a href="ISO"> [ downloads ] </a> |
<a href="estatisticas.php"> [ estatisticas ] </a> |
<a href="extrair.php"> [ extrair ] </a> |
<a href="remontar.php"> [ remontar ] </a> | 
<?php echo $_smarty_tpl->tpl_vars['user']->value;?>

<hr>

</div>

<div id="corpo">
<?php }} ?>