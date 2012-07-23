<?php /* Smarty version Smarty-3.1.10, created on 2012-06-29 16:34:49
         compiled from "view\cadastro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148404fedd92971faa0-31890944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9b5d6e68d1cd67a0e464194aeeb4e2789336a5e' => 
    array (
      0 => 'view\\cadastro.tpl',
      1 => 1340987686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148404fedd92971faa0-31890944',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fedd9297671c4_56028361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fedd9297671c4_56028361')) {function content_4fedd9297671c4_56028361($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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


<?php echo $_smarty_tpl->getSubTemplate ("view/fim.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>