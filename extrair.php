<?php

require_once 'core/Extrair.php';


/* 
 * isso precisa ser executado apenas uma vez para:
 * -> cria os arquivos msbt usados na remontagem e extração dos dialogos Originais(mas podem ser adiquiridos em ISO/ROOT.zip)
 * -> popular a tabela com DialogoOriginal(é uma tabela estatica pode ser usado um bkp da tabela)
 * 
 * caso seja nessesario rodar isso  é recomendado  via terminal/console/cmd e não via http por causa do timerout do php  
 */ 
//die(utf8_decode("não precisa fazer isso agora"));



/* garante boa formatação quando chamado via navegador */
#echo("<pre>");


/*
 * estrai para arquivos na pasta ISO/tmp é rapido cerca de 15 segundos 
 */
Extrair::extrairMsbt();


/*
 * estrai para o banco de dados é lento cerca de 20 MINUTOS 
 */
Extrair::extrairDialogos();


echo("\n\n");
?>