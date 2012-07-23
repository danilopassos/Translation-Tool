<?php /* Smarty version Smarty-3.1.10, created on 2012-06-26 21:38:37
         compiled from "view\clientes.html" */ ?>
<?php /*%%SmartyHeaderCode:73564fea1bc92f84f3-56624615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7dc5399947374b505844f44a3375bcb61a485f8' => 
    array (
      0 => 'view\\clientes.html',
      1 => 1340746715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73564fea1bc92f84f3-56624615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fea1bc934da25_31345537',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fea1bc934da25_31345537')) {function content_4fea1bc934da25_31345537($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<p>Lista de Clientes</p>

    
    <table border="2">
        <tr>
            <td> id: </td>
            <td> nome: </td>
            <td> email: </td>
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
        <tr>
            <td> <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
 </td>
            <td> <?php echo $_smarty_tpl->tpl_vars['row']->value['nome'];?>
 </td>
            <td> <?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
 </td>
        </tr>
        <?php } ?>
        
    </table>
    


<?php echo $_smarty_tpl->getSubTemplate ("view/fim.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>