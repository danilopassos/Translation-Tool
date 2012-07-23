<?php /* Smarty version Smarty-3.1.10, created on 2012-06-29 17:36:14
         compiled from "view\clientes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109494fede702bee7e7-13912195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa07810c165b06d341bfa2c5432d7c4124d4d13b' => 
    array (
      0 => 'view\\clientes.tpl',
      1 => 1340991368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109494fede702bee7e7-13912195',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fede702c913a6_17843965',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fede702c913a6_17843965')) {function content_4fede702c913a6_17843965($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
            <td> <a href="?del=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">deletar </a></td>
        </tr>
        <?php } ?>
        
    </table>
    


<?php echo $_smarty_tpl->getSubTemplate ("view/fim.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>