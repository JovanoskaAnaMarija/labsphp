<?php
$niza1= array(2, 5, 6, 10, 41, 24, 32, 9, 16, 19);
$niza2=array("Ana Marija"=>"Ana Marija", "Jovanoska"=>"Jovanoska", "Prilep"=>"Prilep");
$niza3=array(
    array(1,2,3),
    array(4,5,6),
    array(7,8,9)
);

foreach ($niza1 as $value)
{
    echo $value." ";
}
$arr2=array();
foreach ($niza1 as $value)
{
    if ($value>20)
    {
        array_push($arr2,$value);
    }

}
echo '</br>';
foreach ($arr2 as $value)
{
    echo $value. " ";
}
echo '</br>';
$recenica2 = "PHP is a widely-used general-purpose scripting language that is especially suited for Web development";
$n=explode(' ', $recenica2);
$dolzina=0;
$novaniza=array();
foreach ($n as $value)
{
    $dolzina=strlen($value);
    $novaniza=array($value=>$dolzina);
    print_r($novaniza);
}