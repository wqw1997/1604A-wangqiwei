<?php 
$t = 0;
for($i = 1;$i<5;$i++)
{
	for($j = 1;$j<5;$j++)
	{
		if($i! = $j)
		{
			for($a=1;$a<5;$a++)
			{
				if($a!=$i&&$a!=$j)
				{
					echo $i.$j.$a.'';//能组成'.$t.'个互不相同且无重复数字的三位数';
					$i++;
				}
			}
		}
	}
}
echo '.$t.'; 
?>


<?php 
abstract class Singleton
{
    protected static $instance = array();

    abstract protected function __construct();

    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new $class();
        }
        return self::$instance[$class];
    }
}

class MysqlAdapter extends Singleton
{

    protected $connection = 0;

    protected function __construct()
    {
        $this->connection++;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function setConnection()
    {
        return $this->connection++;
    }
}

$instance = MysqlAdapter::getInstance();//单例模式类
echo $instance->getConnection() . "
";
echo $instance->getConnection() . "
";
echo $instance->getConnection() . "
";
?>

<?php 
function my_scandir($dir)
{
$files = array();
if ( $handle = opendir($dir) ) {
while ( ($file = readdir($handle)) !== false ) {
if ( $file != ".." && $file != "." ) {
if ( is_dir($dir . "/" . $file) ) {
$files[$file] = scandir($dir . "/" . $file);
}else {
$files[] = $file;
}
}
}
closedir($handle);//实现遍历指定文件夹下的所有文件和子文件夹
return $files;
}
}
?>

<?php 
string fun(string str1, string str2)
{
    string temp = "";
    bool flag = false;
    int j;
    for (int i = 0; i < str1.size(); i++)
    {
        if (!flag && str1[i] != str2[i])
        {
            flag = true;
            j = i;
        }
        if (flag && str1[i] == '/')
        {
            temp += "../";
        }
    }
    if (temp == "") temp += '/';//编写代码实现求出两个路径的公共部分
    temp += str2.substr(j);
    return temp;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<h1>
		<p id="year">距离放假还有<span id='d'></span>天<span id='h'></span>小时<span id='m'></span>分
		<span id='s'></span>秒
		<span id='hs'></span>毫秒
		</p>
	</h1>
	</center>
</body>
<ml>
<script>
	var stopTime = new Date(2018,12,10);
	fun();
	var id = setInterval("fun()",1);
	function fun(){
		var date = new Date();
		var day=Math.floor((stopTime-date)/1000/60/60/60/24);
		document.getElementById('d').innerHTML="<font color='red' size='10'>"+day+"</font>";
		var hour = Math.floor(((stopTime-date)/1000/60/60)%24);
		document.getElementById('h').innerHTML="<font color='red' size='10'>"+hour+"</font>";
		var m = Math.floor(((stopTime-date)/1000/60)%60);
		document.getElementById('m').innerHTML="<font color='red' size='10'>"+m+"</font>";
		var s = Math.floor(((stopTime-date)/1000)%60);
		document.getElementById('s').innerHTML="<font color='red' size='10'>"+s+"</font>";
		var  hs= Math.floor(((stopTime-date))%1000);
		document.getElementById('hs').innerHTML="<font color='red' size='10'>"+hs+"</font>";
		if((stopTime-date)<=0){
			clearInterval(id);
			document.getElementById("year").innerHTML="<font color='red' size=6>放假了！</font>"
		}
	}
</script>
