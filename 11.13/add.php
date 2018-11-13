<?php 
header('content-type:text/html;charset=utf8');
echo upn(5);
function upn($n)
{
    $arr = range(1,$n);
    $array = array_sum($arr);
    return $array;
}
?>