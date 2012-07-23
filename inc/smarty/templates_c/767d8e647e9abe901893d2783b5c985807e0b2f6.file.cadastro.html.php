<?php /* Smarty version Smarty-3.1.10, created on 2012-06-29 13:18:15
         compiled from "view/cadastro.html" */ ?>
<?php /*%%SmartyHeaderCode:1192984974fedd547768e94-10898565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '767d8e647e9abe901893d2783b5c985807e0b2f6' => 
    array (
      0 => 'view/cadastro.html',
      1 => 1340739998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1192984974fedd547768e94-10898565',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fedd547804624_52848374',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fedd547804624_52848374')) {function content_4fedd547804624_52848374($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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