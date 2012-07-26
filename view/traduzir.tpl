<!DOCTYPE html>
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
            </div>
            {/if}
</div>
<br><br>
    
    <!-- Postar nova tradução -->
    {if $pos != null} 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <div id="formT1" style="text-align: center;" class="bt">
        <h2>Clique aqui para adicionar uma tradução melhor para este dialogo.</h2>
    </div>
    <div id="formT2" class="borda">
        Crie aqui sua sujestão para esse dialogo tradução:<br/>
        <span> <textarea id="tradu" rows="{$En_US->getNumeroLinhas()}" cols="80" name="utf8">{$En_US->getDialogoUtf8()}</textarea></span> 
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
        <div style="height: 25px;border: 1px solid black; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;border-bottom: none;min-width: 150px; background-color: tan;">
            <img src="style/img/pt_BR.png" alt="flag"/> 
            [id:{$dialogoTraduzido->getId()}]
            [por:{$dialogoTraduzido->getCriador()}]
            [pontos:{$dialogoTraduzido->getPontos()}]
            
            <span class="bt">[gostei + 3pt]</span>
            <span class="bt">[não gostei -3pt]</span>
            <span class="bt">[Editar]</span>
            <span id="apagar{$dialogoTraduzido->getId()}" class="btApagar">[Apagar]</span>
            
        </div>
        <div class="inline" style="border: 1px solid black; border-right: none  ;min-width: 400px; background-color: tan;">
            <b>{$dialogoTraduzido->getDialogoHTML()}</b> 
        </div>
        <div class="inline" style="background-color:  black; top:0px;">
            <textarea readonly="true" cols="80" rows="{$dialogoTraduzido->getNumeroLinhas()}">{$dialogoTraduzido->getDialogoUtf8()}</textarea>
        </div><br class="clearBoth" />
    </div><br>
        <script>
        $(document).ready(function(){
            $("#apagar{$dialogoTraduzido->getId()}").click(function(){
                var r=confirm("Tem certeza, \nquer apagar a tradução id:{$dialogoTraduzido->getId()} ?");
                if (r==true)
                {
                    $.get('gravar.php', { a:'d',arc:'{$arc}', msbt:'{$msbt}', pos:'{$pos}' ,id: '{$dialogoTraduzido->getId()}' }, function(data) {
                        $("#dialogoTraduzido{$dialogoTraduzido->getId()}").hide();
                    });
                }
            });
        });
    </script>
    
{/foreach}
<br><br>
{foreach from=$dialogosOriginais item=dialogoOriginal}
    <div id="original" style="">
        <div style="border: 1px solid black; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;border-bottom: none;min-width: 150px; background-color: tan;">
            <img src="style/img/{$dialogoOriginal->getLang()}.png" alt="flag"/> 
            {$dialogoOriginal->getLangName()} - Texto Original
        </div>
        <div class="inline" style="border: 1px solid black; border-right: none  ;min-width: 400px; background-color: tan;">
            <b>{$dialogoOriginal->getDialogoHTML()}</b> 
        </div>
        <div class="inline" style="background-color: black; top:0px;">
            <textarea readonly="true" cols="80" rows="{$dialogoOriginal->getNumeroLinhas()}">{$dialogoOriginal->getDialogoUtf8()}</textarea>
        </div><br class="clearBoth" />
    </div><br>
{/foreach}
</div>                    
</body>
</html>