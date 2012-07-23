<?php /* Smarty version Smarty-3.1.10, created on 2012-06-29 17:32:01
         compiled from "view\logar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204964feddec20835c1-82939779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57e1fb5d6a874029bc7adfc7c04f291c4425897f' => 
    array (
      0 => 'view\\logar.tpl',
      1 => 1340991116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204964feddec20835c1-82939779',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4feddec20c6280_65264516',
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4feddec20c6280_65264516')) {function content_4feddec20c6280_65264516($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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