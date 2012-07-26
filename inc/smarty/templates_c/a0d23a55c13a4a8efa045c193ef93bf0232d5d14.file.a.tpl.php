<?php /* Smarty version Smarty-3.1.10, created on 2012-07-25 18:36:56
         compiled from "view\a.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2655501002a5aa0ae9-56980845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0d23a55c13a4a8efa045c193ef93bf0232d5d14' => 
    array (
      0 => 'view\\a.tpl',
      1 => 1343241414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2655501002a5aa0ae9-56980845',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_501002a5b15027_39661143',
  'variables' => 
  array (
    'user' => 0,
    'arcs' => 0,
    'iarc' => 0,
    'arc' => 0,
    'msbts' => 0,
    'imsbt' => 0,
    'msbt' => 0,
    'poss' => 0,
    'ipos' => 0,
    'pos' => 0,
    'dialogosTraduzidos' => 0,
    'dialogoTraduzido' => 0,
    'dialogosOriginais' => 0,
    'dialogoOriginal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501002a5b15027_39661143')) {function content_501002a5b15027_39661143($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
        <title>Portal Tradução .: The Legend of Zelda: Skyward Sword :.  pt_BR </title>
        <!link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
    <style>
        div.inline { float:left; }
        .clearBoth { clear:both; }

        body{
            background-color: green;
            color: whitesmoke;
        }

        #menu{
            font-family: Verdana, Arial;
            font-size: 11px;
            position: absolute;
            top: 5px;
            left:  5px;
            width: 150px;
            display: block;

            padding-bottom: 5px;
        }
        #Lista_Dialogos{
            font-family: Verdana, Arial;
            font-size: 11px;
            position: absolute;
            top: 5px;
            left:  160px;
            width: 25px;
            display: block;
            border-radius: 10px;

            border: 1px solid black;
            background-color: tan;

            padding-bottom: 5px;

            padding-top: 5px;
            padding-left: 5px;
        }

        #corpo{
            font-family: Verdana, Arial;
            font-size: 11px;
            position: absolute;
            top: 5px;
            left:  195px;

            display: block;
            border-radius: 10px;

            padding-bottom: 5px;

            padding-top: 5px;
            padding-left: 5px;
        }



        .borda{
            border: 1px solid black;
            border-radius: 10px;

            background-color: tan;
            padding-top: 5px;
            padding-left: 5px;

        }

        a:link, a:visited {
            font-size: 90%;
            font-weight: 500;
            color: black;
        }
    </style> 
</head>
<body>
    <div id="menu">
        <div class="borda" style="text-align: center">
            <strong>The Legend of Zelda</br>Skyward Sword<br/></strong>
        </div>
        <br>

        <div class="borda">
            <a href="index.php">  Index  </a> <br/>
            <a href="traduzir.php"> Traduzir </a> <br/>
            <a href="ISO"> Downloads </a> <br/>
            <a href="estatisticas.php"> Estatisticas </a> <br/>
            <a href="extrair.php"> Extrair </a> <br/>
            <a href="remontar.php"> Remontar </a> <br/> 
            <?php echo $_smarty_tpl->tpl_vars['user']->value;?>

        </div>

        <br>

        <div class="borda">

            <?php  $_smarty_tpl->tpl_vars['iarc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['iarc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arcs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['iarc']->key => $_smarty_tpl->tpl_vars['iarc']->value){
$_smarty_tpl->tpl_vars['iarc']->_loop = true;
?>
                <a  href="?arc=<?php echo $_smarty_tpl->tpl_vars['iarc']->value;?>
"> <?php if ($_smarty_tpl->tpl_vars['iarc']->value==$_smarty_tpl->tpl_vars['arc']->value){?><b><?php }?><?php echo $_smarty_tpl->tpl_vars['iarc']->value;?>
<?php if ($_smarty_tpl->tpl_vars['iarc']->value==$_smarty_tpl->tpl_vars['arc']->value){?></b><?php }?></a> </br>
            <?php } ?>

        </div>

        <br>


        <div class="borda">

            <?php  $_smarty_tpl->tpl_vars['imsbt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['imsbt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msbts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['imsbt']->key => $_smarty_tpl->tpl_vars['imsbt']->value){
$_smarty_tpl->tpl_vars['imsbt']->_loop = true;
?>
                <a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['imsbt']->value;?>
"> <?php if ($_smarty_tpl->tpl_vars['imsbt']->value==$_smarty_tpl->tpl_vars['msbt']->value){?><b><?php }?><?php echo $_smarty_tpl->tpl_vars['imsbt']->value;?>
<?php if ($_smarty_tpl->tpl_vars['imsbt']->value==$_smarty_tpl->tpl_vars['msbt']->value){?></b><?php }?></a> </br>
            <?php } ?>

        </div>

    </div>
    <div id="Lista_Dialogos">

        <?php  $_smarty_tpl->tpl_vars['ipos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ipos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['poss']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ipos']->key => $_smarty_tpl->tpl_vars['ipos']->value){
$_smarty_tpl->tpl_vars['ipos']->_loop = true;
?>
            <a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&pos=<?php echo $_smarty_tpl->tpl_vars['ipos']->value;?>
"> <?php if ($_smarty_tpl->tpl_vars['ipos']->value==$_smarty_tpl->tpl_vars['pos']->value){?><b><?php }?><?php echo $_smarty_tpl->tpl_vars['ipos']->value;?>
<?php if ($_smarty_tpl->tpl_vars['ipos']->value==$_smarty_tpl->tpl_vars['pos']->value){?></b><?php }?></a> <br>
        <?php } ?>

    </div>

    <div id="corpo">
        <div id="traducao" style="display: inline;">
            <?php if ($_smarty_tpl->tpl_vars['pos']->value!=null){?>
            <div class="borda">
                

                <input readonly="true" type="text" name="arc" value="<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
" />
                <input readonly="true" type="text" name="msbt" value="<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
" />
                <?php if ($_smarty_tpl->tpl_vars['pos']->value>0){?><a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&pos=<?php echo $_smarty_tpl->tpl_vars['pos']->value-1;?>
"> <<<<< </a><?php }else{ ?> <<<<< <?php }?>
                <input readonly="true" type="text" name="pos" size="3" value="<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
" />
                <?php if ($_smarty_tpl->tpl_vars['pos']->value<$_smarty_tpl->tpl_vars['ipos']->value){?><a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&pos=<?php echo $_smarty_tpl->tpl_vars['pos']->value+1;?>
"> >>>>> </a><?php }else{ ?> >>>>> <?php }?>   
            </div>
            <?php }?>
</div>
<br><br>
<?php  $_smarty_tpl->tpl_vars['dialogoTraduzido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dialogoTraduzido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dialogosTraduzidos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dialogoTraduzido']->key => $_smarty_tpl->tpl_vars['dialogoTraduzido']->value){
$_smarty_tpl->tpl_vars['dialogoTraduzido']->_loop = true;
?>
    <div id="original" style="">
        <div style="border: 1px solid black; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;border-bottom: none;min-width: 150px; background-color: tan;">
            <img src="style/img/pt_BR.png" alt="flag"/> 
            
        </div>
        <div class="inline" style="border: 1px solid black; border-right: none  ;min-width: 400px; background-color: tan;">
            <b><?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getDialogoHTML();?>
</b> 
        </div>
        <div class="inline" style="background-color: black; top:0px;">
            <textarea readonly="true" cols="80" rows="<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getNumeroLinhas();?>
"><?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getDialogoUtf8();?>
</textarea>
        </div><br class="clearBoth" />
    </div><br>
<?php } ?>
<br><br>
<?php  $_smarty_tpl->tpl_vars['dialogoOriginal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dialogoOriginal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dialogosOriginais']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dialogoOriginal']->key => $_smarty_tpl->tpl_vars['dialogoOriginal']->value){
$_smarty_tpl->tpl_vars['dialogoOriginal']->_loop = true;
?>
    <div id="original" style="">
        <div style="border: 1px solid black; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;border-bottom: none;min-width: 150px; background-color: tan;">
            <img src="style/img/<?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getLang();?>
.png" alt="flag"/> 
            <?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getLangName();?>

        </div>
        <div class="inline" style="border: 1px solid black; border-right: none  ;min-width: 400px; background-color: tan;">
            <b><?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getDialogoHTML();?>
</b> 
        </div>
        <div class="inline" style="background-color: black; top:0px;">
            <textarea readonly="true" cols="80" rows="<?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getNumeroLinhas();?>
"><?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getDialogoUtf8();?>
</textarea>
        </div><br class="clearBoth" />
    </div><br>
<?php } ?>
</div>                    
</body>
</html><?php }} ?>