<?php /* Smarty version Smarty-3.1.10, created on 2012-06-26 19:46:42
         compiled from "view\cadastro.html" */ ?>
<?php /*%%SmartyHeaderCode:87874fea0cdc496e36-50021796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb1600e33e1fe046a3001f9fcb8e97288eb6cb89' => 
    array (
      0 => 'view\\cadastro.html',
      1 => 1340739998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87874fea0cdc496e36-50021796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fea0cdc4d8cd1_92668614',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fea0cdc4d8cd1_92668614')) {function content_4fea0cdc4d8cd1_92668614($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<p>Cadastros de Clientes</p>

<form method="post">
    
    <table>
        <tr>
            <td> nome: </td>
            <td><input type="text" name="nome"></td>
        </tr>
        <tr>
            <td> email: </td>
            <td><input type="text" name="email"></td>
        </tr><tr>
            <td> senha: </td>
            <td><input type="password" name="senha"></td>
        </tr>
    
    </table>
    
    
    <br>
    <input type="submit" value="cadastrar">
</form>


<?php echo $_smarty_tpl->getSubTemplate ("view/fim.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>