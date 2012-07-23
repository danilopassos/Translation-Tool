<?php /* Smarty version Smarty-3.1.10, created on 2012-07-21 17:43:40
         compiled from "view\traduzir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30497500880f776b490-90626745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99f9ab1ff695f0a131f82068ac0ecbeebf2063d6' => 
    array (
      0 => 'view\\traduzir.tpl',
      1 => 1342892609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30497500880f776b490-90626745',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_500880f7824959_91835738',
  'variables' => 
  array (
    'arcfiles' => 0,
    'arcfile' => 0,
    'msbtfiles' => 0,
    'arc' => 0,
    'msbtfile' => 0,
    'subfiles' => 0,
    'msbt' => 0,
    'subfile' => 0,
    'pos' => 0,
    'msgs' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_500880f7824959_91835738')) {function content_500880f7824959_91835738($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table>
    <tr valign="top">
        <td>

            <div style="background-color: skyblue; width: 220px; text-align: left;">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['arcfile'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arcfile']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arcfiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arcfile']->key => $_smarty_tpl->tpl_vars['arcfile']->value){
$_smarty_tpl->tpl_vars['arcfile']->_loop = true;
?>
                        <li><a href="?arcfile=<?php echo $_smarty_tpl->tpl_vars['arcfile']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['arcfile']->value;?>
</a> </li>
                    <?php } ?>
                </ul>
            </div>
            <div style="background-color: silver; width: 220px; text-align: left;">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['msbtfile'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msbtfile']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msbtfiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msbtfile']->key => $_smarty_tpl->tpl_vars['msbtfile']->value){
$_smarty_tpl->tpl_vars['msbtfile']->_loop = true;
?>
                        <li><a href="?arcfile=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbtfile=<?php echo $_smarty_tpl->tpl_vars['msbtfile']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['msbtfile']->value;?>
</a> </li>
                    <?php } ?>
                </ul>
            </div>
        </td>
        <td>

        </td>
        <td>
            <div style="background-color: greenyellow; width: 90px; text-align: left;">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['subfile'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subfile']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subfiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subfile']->key => $_smarty_tpl->tpl_vars['subfile']->value){
$_smarty_tpl->tpl_vars['subfile']->_loop = true;
?>
                        <li><a href="?arcfile=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbtfile=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&subfile=<?php echo $_smarty_tpl->tpl_vars['subfile']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['subfile']->value;?>
</a> </li>
                    <?php } ?>
                </ul>
            </div>
        </td>


        <td>
            <div style="text-align: left;">
                <form action="salvar.php" method="get" accept-charset="utf-8" >
                    <div>
                        <input readonly="true" type="text" name="arc" value="<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
">
                        <input readonly="true" type="text" name="msbt" value="<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
">
                        <input readonly="true" type="text" name="pos" value="<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
">
                    </div>    
                <textarea rows="4" cols="50" name="utf8">{ }</textarea>
                <br>
                <input value="Salvar" type="submit">
                </form>
                
                <br/>
                
                <?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value){
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?>
                    <img width="50px" height="32px" src="style/img/<?php echo $_smarty_tpl->tpl_vars['msg']->value->getLang();?>
.png" alt="flag"/> 
                    <spam> <?php echo $_smarty_tpl->tpl_vars['msg']->value->getLang();?>
 </spam><spam> <?php echo $_smarty_tpl->tpl_vars['msg']->value->getLangName();?>
 </spam>
                    <br/>
                     <pre><?php echo $_smarty_tpl->tpl_vars['msg']->value->getValorFormatadoUtf8();?>
</pre>
                     <br/><br/>


                    <?php } ?>

            </div>
        </td>
    </tr>
</table>

<?php echo $_smarty_tpl->getSubTemplate ("view/fim.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>