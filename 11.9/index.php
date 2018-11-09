<?php

function customComp($a,$b){

        return intval($a.''.$b) > intval($b.''.$a);

}
//自定义排序
// 数组排序，使用自定义排序规则是 a.b>b.a a 和 b互换位置

function PrintMinNumber($numbers)
{
        usort($numbers,'customComp');

        return intval(implode('',$numbers));
}
$arr=array(3,32,321);

$result=PrintMinNumber($arr);

echo "第一种:".$result;
echo "<br><br>";
 

//冒泡方法

function PrintMinNumber2($arr)
{
        $length=count($arr);

        for($i=0;$i<$length;$i++){

                for($j=$i+1;$j<$length;$j++){

                        if(intval($arr[$i].''.$arr[$j])>intval($arr[$j].''.$arr[$i])){
                                $temp=$arr[$i];

                                $arr[$i]=$arr[$j];

                                $arr[$j]=$temp;
                        }   
                }   
        }   
        return intval(implode('',$arr));
}

$result=PrintMinNumber2($arr);

echo "第二种:".$result;
?>