<?php /* Smarty version Smarty-3.1.10, created on 2012-07-21 17:41:03
         compiled from "view\inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283694fedd929773b23-67711205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae40792902009509b7a56774842b09f96e1db718' => 
    array (
      0 => 'view\\inicio.tpl',
      1 => 1342884359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283694fedd929773b23-67711205',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fedd929777b56_59855405',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fedd929777b56_59855405')) {function content_4fedd929777b56_59855405($_smarty_tpl) {?><!DOCTYPE html>
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
                <td><a href="index.php"><img src="style/img/logo2.jpg" alt="logo zelda-ss"/></a></td>
                <td><h1>.: The Legend of Zelda: Skyward Sword :.  pt_BR</h1></td>
            </tr>
        </table>
<hr>
<a href="index.php"> [ index ] </a> |
<a href="traduzir.php"> [ traduzir ] </a> |
<a href="estatisticas.php"> [ estatisticas ] </a> |
<a href="extrair.php"> [ extrair ] </a> |
<a href="remontar.php"> [ remontar ] </a> | 
<?php echo $_smarty_tpl->tpl_vars['user']->value;?>

<hr>

</div>

<div id="corpo">
<?php }} ?>