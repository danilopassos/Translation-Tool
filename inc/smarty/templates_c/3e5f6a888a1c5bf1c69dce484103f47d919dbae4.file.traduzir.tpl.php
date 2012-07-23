<?php /* Smarty version Smarty-3.1.10, created on 2012-07-22 21:38:20
         compiled from "view/traduzir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:844178791500741bae2c8a6-26760501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e5f6a888a1c5bf1c69dce484103f47d919dbae4' => 
    array (
      0 => 'view/traduzir.tpl',
      1 => 1343003890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '844178791500741bae2c8a6-26760501',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_500741bb09d222_40965735',
  'variables' => 
  array (
    'arcs' => 0,
    'iarc' => 0,
    'arc' => 0,
    'msbts' => 0,
    'imsbt' => 0,
    'msbt' => 0,
    'poss' => 0,
    'ipos' => 0,
    'pos' => 0,
    'DialogoPT_BR' => 0,
    'msgs' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_500741bb09d222_40965735')) {function content_500741bb09d222_40965735($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table>
    <tr valign="top">
        <td>

            <div style="background-color: skyblue; width: 220px; text-align: left;">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['iarc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iarc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arcs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['iarc']->key => $_smarty_tpl->tpl_vars['iarc']->value){
$_smarty_tpl->tpl_vars['iarc']->_loop = true;
?>
                        <li><a  href="?arc=<?php echo $_smarty_tpl->tpl_vars['iarc']->value;?>
"> <?php if ($_smarty_tpl->tpl_vars['iarc']->value==$_smarty_tpl->tpl_vars['arc']->value){?>[<?php }?><?php echo $_smarty_tpl->tpl_vars['iarc']->value;?>
<?php if ($_smarty_tpl->tpl_vars['iarc']->value==$_smarty_tpl->tpl_vars['arc']->value){?>]<?php }?></a> </li>
                    <?php } ?>
                </ul>
            </div>
            <div style="background-color: silver; width: 220px; text-align: left;">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['imsbt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['imsbt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msbts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['imsbt']->key => $_smarty_tpl->tpl_vars['imsbt']->value){
$_smarty_tpl->tpl_vars['imsbt']->_loop = true;
?>
                        <li><a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['imsbt']->value;?>
"> <?php if ($_smarty_tpl->tpl_vars['imsbt']->value==$_smarty_tpl->tpl_vars['msbt']->value){?>[<?php }?><?php echo $_smarty_tpl->tpl_vars['imsbt']->value;?>
<?php if ($_smarty_tpl->tpl_vars['imsbt']->value==$_smarty_tpl->tpl_vars['msbt']->value){?>]<?php }?></a> </li>
                    <?php } ?>
                </ul>
            </div>
        </td>
        <td>

        </td>
        <td>
            <div style="background-color: greenyellow; width: 90px; text-align: left;">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['ipos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ipos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['poss']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ipos']->key => $_smarty_tpl->tpl_vars['ipos']->value){
$_smarty_tpl->tpl_vars['ipos']->_loop = true;
?>
                        <li><a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&pos=<?php echo $_smarty_tpl->tpl_vars['ipos']->value;?>
"> <?php if ($_smarty_tpl->tpl_vars['ipos']->value==$_smarty_tpl->tpl_vars['pos']->value){?>[<?php }?><?php echo $_smarty_tpl->tpl_vars['ipos']->value;?>
<?php if ($_smarty_tpl->tpl_vars['ipos']->value==$_smarty_tpl->tpl_vars['pos']->value){?>]<?php }?></a> </li>
                    <?php } ?>
                </ul>
            </div>
        </td>


        <td>
            <?php if ($_smarty_tpl->tpl_vars['pos']->value!=null){?>
                <div style="text-align: left;">
                    <form action="salvar.php" method="get" accept-charset="utf-8" >
                        <div>
                            <input readonly="true" type="text" name="arc" value="<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
" />
                            <input readonly="true" type="text" name="msbt" value="<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
" />
                        <?php if ($_smarty_tpl->tpl_vars['pos']->value>0){?><a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&pos=<?php echo $_smarty_tpl->tpl_vars['pos']->value-1;?>
"> << </a><?php }?>
                        <input readonly="true" type="text" name="pos" size="3" value="<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
" />
                    <?php if ($_smarty_tpl->tpl_vars['pos']->value<$_smarty_tpl->tpl_vars['ipos']->value){?><a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&pos=<?php echo $_smarty_tpl->tpl_vars['pos']->value+1;?>
"> >> </a><?php }?>
                   <input value="Salvar" type="submit">

                </div>
                <textarea rows="7" cols="80" name="utf8"><?php echo $_smarty_tpl->tpl_vars['DialogoPT_BR']->value;?>
</textarea>
                <br>

            <?php }?>
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