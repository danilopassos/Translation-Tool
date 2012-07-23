<?php /* Smarty version Smarty-3.1.10, created on 2012-06-26 15:11:05
         compiled from "view\urlTest.html" */ ?>
<?php /*%%SmartyHeaderCode:40524fe8a976a55a63-26865472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd67dd82fd4673ea1a3eaeb4aa2bda6623c91de54' => 
    array (
      0 => 'view\\urlTest.html',
      1 => 1340723459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40524fe8a976a55a63-26865472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fe8a976a96d35_87964534',
  'variables' => 
  array (
    'url' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe8a976a96d35_87964534')) {function content_4fe8a976a96d35_87964534($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form method="post">
  www.<input type="text" name="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" />
  <input type="submit" value="avaliar" />
</form>

<p>
<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</p>

<?php echo $_smarty_tpl->getSubTemplate ("view/fim.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>