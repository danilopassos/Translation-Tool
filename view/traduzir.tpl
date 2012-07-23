{include file="view/inicio.tpl"}


<table>
    <tr valign="top">
        <td>

            <div style="background-color: skyblue; width: 220px; text-align: left;">
                <ul>
                    {foreach from=$arcs item=iarc}
                        <li><a  href="?arc={$iarc}"> {if $iarc == $arc}[{/if}{$iarc}{if $iarc == $arc}]{/if}</a> </li>
                    {/foreach}
                </ul>
            </div>
            <div style="background-color: silver; width: 220px; text-align: left;">
                <ul>
                    {foreach from=$msbts item=imsbt}
                        <li><a href="?arc={$arc}&msbt={$imsbt}"> {if $imsbt == $msbt}[{/if}{$imsbt}{if $imsbt == $msbt}]{/if}</a> </li>
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
                        <li><a href="?arc={$arc}&msbt={$msbt}&pos={$ipos}"> {if $ipos == $pos}[{/if}{$ipos}{if $ipos == $pos}]{/if}</a> </li>
                    {/foreach}
                </ul>
            </div>
        </td>


        <td>
            {if $pos != null}
                <div style="text-align: left;">
                    <form action="salvar.php" method="get" accept-charset="utf-8" >
                        <div>
                            <input readonly="true" type="text" name="arc" value="{$arc}" />
                            <input readonly="true" type="text" name="msbt" value="{$msbt}" />
                        {if $pos > 0}<a href="?arc={$arc}&msbt={$msbt}&pos={$pos - 1}"> << </a>{/if}
                        <input readonly="true" type="text" name="pos" size="3" value="{$pos}" />
                    {if $pos < $ipos}<a href="?arc={$arc}&msbt={$msbt}&pos={$pos + 1}"> >> </a>{/if}
                   <input value="Salvar" type="submit">

                </div>
                <textarea rows="7" cols="80" name="utf8">{$DialogoPT_BR}</textarea>
                <br>

            {/if}
        </form>

        <br/>

        {foreach from=$msgs item=msg}
            <img width="50px" height="32px" src="style/img/{$msg->getLang()}.png" alt="flag"/> 
            <spam> {$msg->getLang()} </spam><spam> {$msg->getLangName()} </spam>
            <br/>
            <pre>{$msg->getValorFormatadoUtf8()}</pre>
            <br/><br/>


        {/foreach}

    </div>
</td>
</tr>
</table>

{include file="view/fim.tpl"}