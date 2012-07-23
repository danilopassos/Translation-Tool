#!/bin/bash

#creditos a http://www.youtube.com/metalx1000

x=$1
y=$(wget -U "Mozilla/5.0" -qO - "http://translate.google.com.br/translate_a/t?client=t&text=$x&sl=es&tl=pt-BR")
z=$(echo $y | sed 's/\[\[\[\"//' | cut -d \" -f 1)
#echo $y
echo $z
