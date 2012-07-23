{include file="view/inicio.tpl"}

<table style="text-align: left;">
    <tr valign="top">
        <td>
            <div style="background-color: skyblue; width: 220px; text-align: left;">
                <ul>
                    {foreach from=$arcs item=iarc}
                        <li><a  href="?arc={$iarc}"> {if $iarc == $arc}<b>[{/if}{$iarc}{if $iarc == $arc}]</b>{/if}</a> </li>
                    {/foreach}
                </ul>
            </div>
            <div style="background-color: silver; width: 220px; text-align: left;">
                <ul>
                    {foreach from=$msbts item=imsbt}
                        <li><a href="?arc={$arc}&msbt={$imsbt}"> {if $imsbt == $msbt}<b>[{/if}{$imsbt}{if $imsbt == $msbt}]</b>{/if}</a> </li>
                    {/foreach}
                </ul>
            </div>
        </td>
        <td>

        </td>
        <td>
            <div style="background-color: greenyellow; width: 90px; text-align: left;">
                <ul>
                    {foreach from=$poss item=ipos}
                        <li><a href="?arc={$arc}&msbt={$msbt}&pos={$ipos}"> {if $ipos == $pos}<b>[{/if}{$ipos}{if $ipos == $pos}]</b>{/if}</a> </li>
                    {/foreach}
                </ul>
            </div>
        </td>
        <td>
            {if $pos != null}
                <form action="salvar.php" method="get" accept-charset="utf-8" >
                    <input readonly="true" type="text" name="arc" value="{$arc}" />
                    <input readonly="true" type="text" name="msbt" value="{$msbt}" />
                    {if $pos > 0}<a href="?arc={$arc}&msbt={$msbt}&pos={$pos - 1}"> <<<<< </a>{else} <<<<< {/if}
                    <input readonly="true" type="text" name="pos" size="3" value="{$pos}" />
                    <input value="   Salvar   " type="submit">
                    {if $pos < $ipos}<a href="?arc={$arc}&msbt={$msbt}&pos={$pos + 1}"> >>>>> </a>{else} >>>>> {/if}
                    <br/>
                    <textarea rows="7" cols="80" name="utf8">{$DialogoPT_BR}</textarea>          
                </form>
            {/if}
        

        {foreach from=$msgs item=msg}
            <img width="50px" height="32px" src="style/img/{$msg->getLang()}.png" alt="flag"/> 
            <spam> {$msg->getLang()} </spam><spam> {$msg->getLangName()} </spam>
            <pre>{$msg->getValorFormatadoUtf8()}</pre>
        {/foreach}

    </div>
</td>
</tr>
</table>

{include file="view/fim.tpl"}