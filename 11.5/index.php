<?php 
$sum = 0;
for($i=1;$i<=100;$i++){
	$sum+=$i;
}
echo $sum;
?>
<br>
<?php 
echo array_sum(range(1,100));

 ?>
<br>
 <?php 
$n = 100;
echo(1+$n)*($n/2);

 ?>
<br>

<?php 

 function ishuiwen($str){
  $len=strlen($str);
  $l=1;
  $k=intval($len/2)+1;
   for($j=0;$j<$k;$j++){
    if (substr($str,$j,1)!=substr($str,$len-$j-1,1))
     {
  $l=0;
  break;
   }
 }
 if ($l==1)
 {
 return 1;
 }
 else
 {
 return -1;
  }
 }
 $str=12321;
 echo ishuiwen($str);


?>