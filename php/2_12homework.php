<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2_12homework</title>
</head>
<body>
<form action="#" method="post">
    <input type="number" placeholder="请输入要打印的行数" name="num" />
    <br>
    <input type="submit" value="金字塔" name="ta"/>
    <input type="submit" value="空心菱形" name="ling" />
</form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/7
 * Time: 17:47
 */
error_reporting(E_ALL ^ E_NOTICE);
// 判断是金字塔还是空心菱形
//echo $_POST['num'],$_POST['ta'],$_POST['ling'];
if(isset($_POST['num']) && $_POST['num'] >= 0)
{
    if(isset($_POST['ta']))
    {
        setPyramid();
    }
    elseif (isset($_POST['ling']))
    {
        setDiamond();
    }
}
else
{
    echo '打印的行数不能为负数和空值！';
}
//金字塔打印函数
function setPyramid()
{
    $n = $_POST['num'];
    for($i=1; $i<=$n; $i++)
    {
        for ($k=$i; $k<=$n; $k++)
            echo '<span style="color:#FFF;">*</span>';
        $j = 2*$i-1;
        while($j-- > 0)
            echo '*';
        echo '<br>';
    }
}
//空心菱形打印函数
function setDiamond()
{
    $n = $_POST['num'];
    for($i=1;$i<=$n;$i++){
        //打印空格
        for($j=1;$j<=$n-$i;$j++){
            echo "&nbsp;";
        }
        //打印*号
        for($k=1;$k<=2*$i-1;$k++){
            //打印第一行后最后一行都打*连接($i==1 || $i==5)
            if($i==1){ //去掉$i==5 把中间抛空
                echo "*";
            }else{
                //怎么打空格和*号的问题
                if($k==1 || $k==2*$i-1){
                    echo "*";
                }else{
                    echo "&nbsp;";
                }
            }
        }
        echo "<br/>";
    }
    //倒转 抛空
    for($i=$n;$i>=0;$i--){
        //打印空格
        for($j=0;$j<=$n-$i;$j++){
            echo "&nbsp;";
        }
        //打印*号
        for($k=1;$k<=2*$i-3;$k++){
            //怎么打空格和*号的问题
            if($k==2*$i-3 || $k==1){
                echo "*";
            }else{
                echo "&nbsp;";
            }
        }
        echo "<br/>";
    }
}