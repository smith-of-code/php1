<?php
$a = 1;
$b = 2;
$a = $b ^ $a  ^ $b = $a ^ $b ^ $b;

var_dump("a = $a");
var_dump("b = $b");