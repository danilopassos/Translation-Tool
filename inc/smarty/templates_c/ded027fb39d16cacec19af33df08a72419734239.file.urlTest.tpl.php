<?php /* Smarty version Smarty-3.1.10, created on 2012-06-29 16:41:06
         compiled from "view\urlTest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99974fedda80705b37-65695366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ded027fb39d16cacec19af33df08a72419734239' => 
    array (
      0 => 'view\\urlTest.tpl',
      1 => 1340988059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99974fedda80705b37-65695366',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fedda80756a37_50860354',
  'variables' => 
  array (
    'url' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fedda80756a37_50860354')) {function content_4fedda80756a37_50860354($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form method="post">
  www.<input type="text" name="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" />
  <input type="submit" value="avaliar" />
</form>

<p>
<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</p>

<?php echo $_smarty_tpl->getSubTemplate ("view/fim.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>