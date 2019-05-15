<?php

$semana = array (
    "s" => "Segunda-Feira",
    "t" => "Terça-Feira",
    "q" => "Quarta-Feira",
    "qq" => "Quinta-Feira",
    "s" => "Sexta-Feira",
    "ss" => "Sábado",
    "d" => "Domingo"
);

foreach ($semana as $chave => $valor){
    echo ("<br />");
    echo ("Chave: " .$chave);
    echo ("<br />");
    echo ("Valor: " .$valor);
}

echo ("<p>&nbsp;</p>");

$programas = array("illustrator", "photoshop", "flash", "dreamweaver");

foreach ($programas as $valor){
    echo ("<br />");
    echo ("Programas: " .$valor);
}
?>