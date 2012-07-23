<?php /* Smarty version Smarty-3.1.10, created on 2012-07-06 22:33:06
         compiled from "view/logar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12847663304ff791d2c15ee7-85844773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ba04d5e6a97bb601aec4d61e7993e292153330c' => 
    array (
      0 => 'view/logar.tpl',
      1 => 1340991116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12847663304ff791d2c15ee7-85844773',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ff791d2cf3ba4_68047279',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff791d2cf3ba4_68047279')) {function content_4ff791d2cf3ba4_68047279($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form method="post">

    <table>
        <tr>
            <td>Email: </td>
            <td><input type="text" name="email" width="50"/></td>
        </tr>
        <tr>
            <td>Senha: </td>
            <td><input type="password" name="senha"/></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right" > <input type="submit" value="Logar" /> </td> 
        </tr>
    </table>
    

</form>

<p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
    

<?php echo $_smarty_tpl->getSubTemplate ("view/fim.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>