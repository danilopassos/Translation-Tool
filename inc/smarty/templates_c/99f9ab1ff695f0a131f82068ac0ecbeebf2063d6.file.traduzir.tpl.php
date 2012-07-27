<?php /* Smarty version Smarty-3.1.10, created on 2012-07-27 17:23:36
         compiled from "view\traduzir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30497500880f776b490-90626745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99f9ab1ff695f0a131f82068ac0ecbeebf2063d6' => 
    array (
      0 => 'view\\traduzir.tpl',
      1 => 1343409803,
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <!link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
    <style>
        div.inline { float:left; }
        .clearBoth { clear:both; }

        body{
            background-color: green;
            
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
            font-size: 14px;
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
        
        .dialogoHead{
            border: 1px solid black; 
            border-top-left-radius: 10px; 
            border-top-right-radius: 10px; 
            text-align: center;
            border-bottom: none;
            
            padding: 10px;

            color: black;
            
            background-color: tan;
            
            vertical-align: center;

        }
        .dialogoPreview{
             
            color: white;
            border: 1px solid black; 
            min-width: 400px; 
            background-color: #9B410E;
        }
        .dialogoPreview:hover{
            background-color: black;
        }
        .dialogoPreview:active{
            
        }
        
        .dialogoEditor{
            background-color: black;
            text-align: center;
        }
        .dialogoEditorTextArea{
            width: 98%;
        }
        
    </style> 
</head>
<body>
    <div id="menu">
        <div class="borda" style="text-align: center">
            <img src="style/img/75px-Triforce.png" alt="logo"><br>
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
                    &nbsp; <span id="novaTradu" class="bt"> [ Criar Nova Tradução ] </span>
                </div>
            <?php }?>
</div>

    
    <!-- Postar nova tradução -->
    <?php if ($_smarty_tpl->tpl_vars['pos']->value!=null){?> 
    
    <div id="dialogoNovaTradu">
        <div class="dialogoHead">
            <img style="position: absolute ; left: 20px;" src="style/img/pt_BR.png" alt="flag"/> 
            Crie aqui sua sujestão para esse dialogo tradução:
            <span id="buttonPrev" class="bt" >[ Prever ]</span>
            <span id="buttonPostar" class="bt" > [Postar nova tradução ]</span>
        </div>
        
        <div class="dialogoPreview" id="prever"> &nbsp; </div>
        
        <div class="dialogoEditor">
            <textarea id="tradu" rows="<?php echo $_smarty_tpl->tpl_vars['En_US']->value->getNumeroLinhas();?>
" class="dialogoEditorTextArea" name="utf8"><?php echo $_smarty_tpl->tpl_vars['En_US']->value->getDialogoUtf8();?>
</textarea>
        </div>
        
        <br class="clearBoth" />

    </div>
    
        
    <script>
        $(document).ready(function(){
            $("#dialogoNovaTradu").hide();
            $("#novaTradu").click(function(){
                $("#novaTradu").hide();
                $("#dialogoNovaTradu").show();
            });
            $("#buttonPrev").click(function(){
                $.get('preview.php', { tradu: $('#tradu').val() }, function(data) {
                    $('#prever').html("<b>" + data + "</b>");
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
        <div id="headEditor<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" class="dialogoHead" >
            Poder editar o dialogo agora.
            <span id="buttonPrev<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" class="bt" >[ Prever ]</span>
            <span id="buttonUpdate<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" class="bt" > [ Salvar alteração ]</span>
        </div>
            
        <div id="viewEditor<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" class="dialogoHead" >
            <img style="position: absolute ; left: 20px;" src="style/img/pt_BR.png" alt="flag"/> 
            [id:<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
]
            [por:<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getCriador();?>
]
            [pontos:<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getPontos();?>
]
            
            <span class="bt">[gostei + 3pt]</span>
            <span class="bt">[não gostei -3pt]</span>
            <span id="btEditor<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" class="bt">[Editar]</span>
            <span id="btApagar<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" class="btApagar">[Apagar]</span>
            
        </div>
        
        <div id="dialogoPreview<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" class="dialogoPreview">
            <b><?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getDialogoHTML();?>
</b> 
        </div>
        
        <div  class="dialogoEditor">
            <textarea id="ta<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
" readonly="true" class="dialogoEditorTextArea" rows="<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getNumeroLinhas();?>
"><?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getDialogoUtf8();?>
</textarea>
        </div>
        
        <br class="clearBoth" />
    </div>
        <script>
        $(document).ready(function(){
            $("#headEditor<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").hide();
                        
            $("#btEditor<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").click(function(){
                
                $("#headEditor<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").show();
                $("#viewEditor<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").hide();
               $("#ta<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").removeAttr('readonly');
            });
            
            
            
            
            $("#btApagar<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
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
            
            $("#buttonPrev<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").click(function(){
                $.get('preview.php', { tradu: $("#ta<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").val() }, function(data) {
                    $('#dialogoPreview<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
').html("<b>" + data + "</b>");
                });
            });
            $("#buttonUpdate<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
").click(function(){
                var r=confirm("Tem certeza,\n que quer salvar ?");
                if (r==true)
                {
                
                    $.get('gravar.php', { a:'u',arc:'<?php echo $_smarty_tpl->tpl_vars['arc']->value;?>
', msbt:'<?php echo $_smarty_tpl->tpl_vars['msbt']->value;?>
', pos:'<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
', id : '<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
' ,utf8: $('#ta<?php echo $_smarty_tpl->tpl_vars['dialogoTraduzido']->value->getId();?>
').val() }, function(data) {

                        location.reload();
                    });
                }
            });
            
            
            
            
            
            
            
            
            
            
        });
    </script>
    
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['dialogoOriginal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dialogoOriginal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dialogosOriginais']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dialogoOriginal']->key => $_smarty_tpl->tpl_vars['dialogoOriginal']->value){
$_smarty_tpl->tpl_vars['dialogoOriginal']->_loop = true;
?>
    <div id="dialogo<?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getLang();?>
" >
        
        <div class="dialogoHead">
            <img style="position: absolute ; left: 20px;" src="style/img/<?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getLang();?>
.png" alt="flag"/> <?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getLangName();?>
 - Texto Original
        </div>
        
        <div class="dialogoPreview">
            <b><?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getDialogoHTML();?>
</b> 
        </div>
       
        
        <div class="dialogoEditor">
            <textarea class="dialogoEditorTextArea" readonly="true" rows="<?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getNumeroLinhas();?>
"><?php echo $_smarty_tpl->tpl_vars['dialogoOriginal']->value->getDialogoUtf8();?>
</textarea>
        </div>
        
        <br class="clearBoth" />
        
    </div>
<?php } ?>
</div>                    
</body>
</html><?php }} ?>