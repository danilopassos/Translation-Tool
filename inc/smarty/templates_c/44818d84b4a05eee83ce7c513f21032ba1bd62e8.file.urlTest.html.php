<?php /* Smarty version Smarty-3.1.10, created on 2012-06-29 13:18:25
         compiled from "view/urlTest.html" */ ?>
<?php /*%%SmartyHeaderCode:9444115314fedd5516dae51-55596126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44818d84b4a05eee83ce7c513f21032ba1bd62e8' => 
    array (
      0 => 'view/urlTest.html',
      1 => 1340723459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9444115314fedd5516dae51-55596126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fedd551810d29_48613846',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fedd551810d29_48613846')) {function content_4fedd551810d29_48613846($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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