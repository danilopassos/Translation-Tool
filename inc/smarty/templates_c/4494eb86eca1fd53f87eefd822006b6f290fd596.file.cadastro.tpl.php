<?php /* Smarty version Smarty-3.1.10, created on 2012-07-06 23:11:47
         compiled from "view/cadastro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2209712234ff79ae39a8f25-71582073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4494eb86eca1fd53f87eefd822006b6f290fd596' => 
    array (
      0 => 'view/cadastro.tpl',
      1 => 1340987686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2209712234ff79ae39a8f25-71582073',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ff79ae3a5d9f7_59134331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff79ae3a5d9f7_59134331')) {function content_4ff79ae3a5d9f7_59134331($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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