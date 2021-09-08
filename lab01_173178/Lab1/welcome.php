<?php
echo "Welcome to PHP!</br>";

$x = 3;
$y="hello world";
$niza=array(1,2,3);
echo ($x);
echo "</br>";
echo ($y);
echo "</br>";
print_r($niza);
echo "</br>";
$ime = "Ana Marija";
$prezime="Jovanoska";
$recenica="welcome to php!";
echo $ime." ".$prezime;
echo "</br>";
echo strtoupper($recenica);//site bukvi golemi
echo "</br>";
echo strtolower($recenica);//site bukvi mali
echo "</br>";
echo ucfirst($recenica);//prva bukva golema
echo "</br>";
echo ucwords($recenica);//prva bukva od sekoj zbor golema
echo "</br>";
$arr = array('programski', 'praktikum', 'laboratoriski', 'vezbi');
echo implode(" " , $arr);
echo "</br>";
$pole1= array(2, 5, 6, 10, 41, 24, 32, 9, 16, 19);
$pole2=array("Ana Marija"=>"Ana Marija", "Jovanoska"=>"Jovanoska", "Prilep"=>"Prilep");
$pole3=array(
    array(1,2,3),
    array(4,5,6),
    array(7,8,9)
);
for($i=0;$i<count($pole1);$i++)
{
echo $pole1[$i]." ";
}
echo "</br>";
foreach ($pole1 as $value)
{
    echo $value." ";
}
echo "</br>";
$arr2=array();
foreach ($pole1 as $value)
{
    if ($value>20)
    {
       array_push($arr2,$value);
    }

}
foreach ($arr2 as $value)
{
    echo $value. " ";
}

echo "</br>";
echo min($pole1);
echo "</br>";
echo max($pole1);
echo "</br>";
$recenica2 = "PHP is a widely-used general-purpose scripting language that is especially suited for Web development";
$niza2=explode(' ', $recenica2);
$dolzina=0;
$novaniza=array();
foreach ($niza2 as $value)
{
    $dolzina=strlen($value);
    $novaniza=array($value=>$dolzina);
    print_r($novaniza);

}




