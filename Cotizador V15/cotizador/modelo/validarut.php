<?php

$rutin=strrev($rut);
$cant=strlen($rutin);

$c=0;

while($c<$cant)
{
$r[$c]=substr($rutin,$c,1);
$c++;
}
$ca=count($r);
$m=2;
$c2=0;
$suma=0;

while($c2<$ca)
{
$suma=$suma+($r[$c2]*$m);
if($m==7)
{
$m=2;
}else{
$m++;
}
$c2++;
}

$resto=$suma%11;

$digito=11-$resto;

if($digito==10)
{
$digito="K"||"k";
}else{
if($digito==11)
{
$digito="0";
}
}


?>