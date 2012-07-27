<!DOCTYPE html>
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
            {$user}
        </div>

        <br>

        <div class="borda">

            {foreach from=$arcs item=iarc}
                <a  href="?arc={$iarc}"> {if $iarc == $arc}<b>{/if}{$iarc}{if $iarc == $arc}</b>{/if}</a> </br>
            {/foreach}

        </div>

        <br>


        <div class="borda">

            {foreach from=$msbts item=imsbt}
                <a href="?arc={$arc}&msbt={$imsbt}"> {if $imsbt == $msbt}<b>{/if}{$imsbt}{if $imsbt == $msbt}</b>{/if}</a> </br>
            {/foreach}

        </div>

    </div>
    <div id="Lista_Dialogos">

        {foreach from=$poss item=ipos}
            <a href="?arc={$arc}&msbt={$msbt}&pos={$ipos}"> {if $ipos == $pos}<b>{/if}{$ipos}{if $ipos == $pos}</b>{/if}</a> <br>
        {/foreach}

    </div>

    <div id="corpo">
        <div id="traducao">
            {if $pos != null}
                <div class="borda" style="height: 30px;">
                    <input readonly="true" type="text" name="arc" value="{$arc}" />
                    <input readonly="true" type="text" name="msbt" value="{$msbt}" />
                    {if $pos > 0}<a href="?arc={$arc}&msbt={$msbt}&pos={$pos - 1}" > <span class="bt"><<<<< </span></a>{else} <<<<< {/if}
                    <input readonly="true" type="text" name="pos" size="3" value="{$pos}" />
                    {if $pos < $ipos}<a href="?arc={$arc}&msbt={$msbt}&pos={$pos + 1}"><span class="bt"> >>>>> </span></a>{else} >>>>> {/if}
                    &nbsp; <span id="novaTradu" class="bt"> [ Criar Nova Tradução ] </span>
                </div>
            {/if}
</div>

    
    <!-- Postar nova tradução -->
    {if $pos != null} 
    
    <div id="dialogoNovaTradu">
        <div class="dialogoHead">
            <img style="position: absolute ; left: 20px;" src="style/img/pt_BR.png" alt="flag"/> 
            Crie aqui sua sujestão para esse dialogo tradução:
            <span id="buttonPrev" class="bt" >[ Prever ]</span>
            <span id="buttonPostar" class="bt" > [Postar nova tradução ]</span>
        </div>
        
        <div class="dialogoPreview" id="prever"> &nbsp; </div>
        
        <div class="dialogoEditor">
            <textarea id="tradu" rows="{$En_US->getNumeroLinhas()}" class="dialogoEditorTextArea" name="utf8">{$En_US->getDialogoUtf8()}</textarea>
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
                
                    $.get('gravar.php', { a:'i',arc:'{$arc}', msbt:'{$msbt}', pos:'{$pos}' ,utf8: $('#tradu').val() }, function(data) {

                        location.reload();
                    });
                }
            });
        });
    </script>
    {/if}
    
<br><br>
<!-- lista das traduçoes -->
{foreach from=$dialogosTraduzidos item=dialogoTraduzido}
    <div id="dialogoTraduzido{$dialogoTraduzido->getId()}" style="">
        <div id="headEditor{$dialogoTraduzido->getId()}" class="dialogoHead" >
            Poder editar o dialogo agora.
            <span id="buttonPrev{$dialogoTraduzido->getId()}" class="bt" >[ Prever ]</span>
            <span id="buttonUpdate{$dialogoTraduzido->getId()}" class="bt" > [ Salvar alteração ]</span>
        </div>
            
        <div id="viewEditor{$dialogoTraduzido->getId()}" class="dialogoHead" >
            <img style="position: absolute ; left: 20px;" src="style/img/pt_BR.png" alt="flag"/> 
            [id:{$dialogoTraduzido->getId()}]
            [por:{$dialogoTraduzido->getCriador()}]
            [pontos:{$dialogoTraduzido->getPontos()}]
            
            <span class="bt">[gostei + 3pt]</span>
            <span class="bt">[não gostei -3pt]</span>
            <span id="btEditor{$dialogoTraduzido->getId()}" class="bt">[Editar]</span>
            <span id="btApagar{$dialogoTraduzido->getId()}" class="btApagar">[Apagar]</span>
            
        </div>
        
        <div id="dialogoPreview{$dialogoTraduzido->getId()}" class="dialogoPreview">
            <b>{$dialogoTraduzido->getDialogoHTML()}</b> 
        </div>
        
        <div  class="dialogoEditor">
            <textarea id="ta{$dialogoTraduzido->getId()}" readonly="true" class="dialogoEditorTextArea" rows="{$dialogoTraduzido->getNumeroLinhas()}">{$dialogoTraduzido->getDialogoUtf8()}</textarea>
        </div>
        
        <br class="clearBoth" />
    </div>
        <script>
        $(document).ready(function(){
            $("#headEditor{$dialogoTraduzido->getId()}").hide();
                        
            $("#btEditor{$dialogoTraduzido->getId()}").click(function(){
                
                $("#headEditor{$dialogoTraduzido->getId()}").show();
                $("#viewEditor{$dialogoTraduzido->getId()}").hide();
               $("#ta{$dialogoTraduzido->getId()}").removeAttr('readonly');
            });
            
            
            
            
            $("#btApagar{$dialogoTraduzido->getId()}").click(function(){
                var r=confirm("Tem certeza, \nquer apagar a tradução id:{$dialogoTraduzido->getId()} ?");
                if (r==true)
                {
                    $.get('gravar.php', { a:'d',arc:'{$arc}', msbt:'{$msbt}', pos:'{$pos}' ,id: '{$dialogoTraduzido->getId()}' }, function(data) {
                        $("#dialogoTraduzido{$dialogoTraduzido->getId()}").hide();
                    });
                }
            });
            
            $("#buttonPrev{$dialogoTraduzido->getId()}").click(function(){
                $.get('preview.php', { tradu: $("#ta{$dialogoTraduzido->getId()}").val() }, function(data) {
                    $('#dialogoPreview{$dialogoTraduzido->getId()}').html("<b>" + data + "</b>");
                });
            });
            $("#buttonUpdate{$dialogoTraduzido->getId()}").click(function(){
                var r=confirm("Tem certeza,\n que quer salvar ?");
                if (r==true)
                {
                
                    $.get('gravar.php', { a:'u',arc:'{$arc}', msbt:'{$msbt}', pos:'{$pos}', id : '{$dialogoTraduzido->getId()}' ,utf8: $('#ta{$dialogoTraduzido->getId()}').val() }, function(data) {

                        location.reload();
                    });
                }
            });
            
            
            
            
            
            
            
            
            
            
        });
    </script>
    
{/foreach}

{foreach from=$dialogosOriginais item=dialogoOriginal}
    <div id="dialogo{$dialogoOriginal->getLang()}" >
        
        <div class="dialogoHead">
            <img style="position: absolute ; left: 20px;" src="style/img/{$dialogoOriginal->getLang()}.png" alt="flag"/> {$dialogoOriginal->getLangName()} - Texto Original
        </div>
        
        <div class="dialogoPreview">
            <b>{$dialogoOriginal->getDialogoHTML()}</b> 
        </div>
       
        
        <div class="dialogoEditor">
            <textarea class="dialogoEditorTextArea" readonly="true" rows="{$dialogoOriginal->getNumeroLinhas()}">{$dialogoOriginal->getDialogoUtf8()}</textarea>
        </div>
        
        <br class="clearBoth" />
        
    </div>
{/foreach}
</div>                    
</body>
</html>