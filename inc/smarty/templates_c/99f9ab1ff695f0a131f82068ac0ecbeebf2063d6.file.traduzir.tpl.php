<?php /* Smarty version Smarty-3.1.10, created on 2012-07-26 06:01:43
         compiled from "view\traduzir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30497500880f776b490-90626745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99f9ab1ff695f0a131f82068ac0ecbeebf2063d6' => 
    array (
      0 => 'view\\traduzir.tpl',
      1 => 1343282500,
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
    'En_US' => 0,
    'dialogosTraduzidos' => 0,
    'dialogoTraduzido' => 0,
    'dialogosOriginais' => 0,
    'dialogoOriginal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_500880f7824959_91835738')) {function content_500880f7824959_91835738($_smarty_tpl) {?><!DOCTYPE html>
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
            padding-bottom: 5px;

        }

        a:link, a:visited {
            font-size: 90%;
            font-weight: 500;
            color: black;
        }
        
        .bt{
            border: 1px solid black;
            
            padding-top: 5px;
            padding-left: 5px;
            padding-bottom: 5px;
            padding-right:  5px;
            
            background-color: #f0c040;
        }
        
        .bt:hover,.btApagar:hover , a:hover {
            background-color: #9B410E;
            cursor: pointer;
        }
        .btApagar{
            border: 1px solid black;
            
            padding-top: 5px;
            padding-left: 5px;
            padding-bottom: 5px;
            padding-right:  5px;
            
            background-color: red;
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
        <div id="traducao">
            <?php if ($_smarty_tpl->tpl_vars['pos']->value!=null){?>
                <div class="borda" style="height: 30px;">
                

 <input readonly="true" type="text" name="arc" value="<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
" />
                <input readonly="true" type="text" name="msbt" value="<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
" />
            <?php if ($_smarty_tpl->tpl_vars['pos']->value>0){?><a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&pos=<?php echo $_smarty_tpl->tpl_vars['pos']->value-1;?>
" > <span class="bt"><<<<< </span></a><?php }else{ ?> <<<<< <?php }?>
                <input readonly="true" type="text" name="pos" size="3" value="<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
" />
                <?php if ($_smarty_tpl->tpl_vars['pos']->value<$_smarty_tpl->tpl_vars['ipos']->value){?><a href="?arc=<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
&msbt=<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
&pos=<?php echo $_smarty_tpl->tpl_vars['pos']->value+1;?>
"><span class="bt"> >>>>> </span></a><?php }else{ ?> >>>>> <?php }?>   
            </div>
            <?php }?>
</div>
<br><br>
    
    <!-- Postar nova tradução -->
    <?php if ($_smarty_tpl->tpl_vars['pos']->value!=null){?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <div id="formT1" style="text-align: center;" class="bt">
        <h2>Clique aqui para adicionar uma tradução melhor para este dialogo.</h2>
    </div>
    <div id="formT2" class="borda">
        Crie aqui sua sujestão para esse dialogo tradução:<br/>
        <span> <textarea id="tradu" rows="<?php echo $_smarty_tpl->tpl_vars['En_US']->value->getNumeroLinhas();?>
" cols="80" name="utf8"><?php echo $_smarty_tpl->tpl_vars['En_US']->value->getDialogoUtf8();?>
</textarea></span> 
             <span><div class="borda" style="width: 400px;" id="prever"></div></span>  
        <span id="buttonPrev" class="bt" >[ Prever ]</span>
        <span id="buttonPostar" class="bt" > [Postar nova tradução ]</span>
    </div>
    <script>
        $(document).ready(function(){
            $("#formT2").hide();
            $("#formT1").click(function(){
                $("#formT1").hide();
                $("#formT2").show();
                $("#prever").hide();
            });
            $("#buttonPrev").click(function(){
                $.get('preview.php', { tradu: $('#tradu').val() }, function(data) {
                    $('#prever').html(data);
                    $("#prever").show();
                });
            });
            $("#buttonPostar").click(function(){
                var r=confirm("Tem certeza,\n que quer salvar ?");
                if (r==true)
                {
                
                    $.get('gravar.php', { a:'i',arc:'<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
', msbt:'<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
', pos:'<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
' ,utf8: $('#tradu').val() }, function(data) {

                        location.reload();
                    });
                }
            });
        });
    </script>
    <?php }?>
    
<br><br>
<!-- lista das traduçoes -->
<?php  $_smarty_tpl->tpl_vars['dialogoTraduzido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dialogoTraduzido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dialogosTraduzidos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dialogoTraduzido']->key => $_smarty_tpl->tpl_vars['dialogoTraduzido']->value){
$_smarty_tpl->tpl_vars['dialogoTraduzido']->_loop = true;
?>
    <div id="dialogoTraduzido<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" style="">
        <div style="height: 25px;border: 1px solid black; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;border-bottom: none;min-width: 150px; background-color: tan;">
            <img src="style/img/pt_BR.png" alt="flag"/> 
            [id:<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
]
            [por:<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getCriador();?>
]
            [pontos:<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getPontos();?>
]
            
            <span class="bt">[gostei + 3pt]</span>
            <span class="bt">[não gostei -3pt]</span>
            <span class="bt">[Editar]</span>
            <span id="apagar<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" class="btApagar">[Apagar]</span>
            
        </div>
        <div class="inline" style="border: 1px solid black; border-right: none  ;min-width: 400px; background-color: tan;">
            <b><?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getDialogoHTML();?>
</b> 
        </div>
        <div class="inline" style="background-color:  black; top:0px;">
            <textarea readonly="true" cols="80" rows="<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getNumeroLinhas();?>
"><?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getDialogoUtf8();?>
</textarea>
        </div><br class="clearBoth" />
    </div><br>
        <script>
        $(document).ready(function(){
            $("#apagar<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").click(function(){
                var r=confirm("Tem certeza, \nquer apagar a tradução id:<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
 ?");
                if (r==true)
                {
                    $.get('gravar.php', { a:'d',arc:'<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
', msbt:'<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
', pos:'<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
' ,id: '<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
' }, function(data) {
                        $("#dialogoTraduzido<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").hide();
                    });
                }
            });
        });
    </script>
    
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
 - Texto Original
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