<?php


$method =$_SERVER['REQUEST_METHOD'];
$link= new PDO("mysql:host=localhost;dbname=greatcom;charset=UTF8", 'root', '');



$comments=[];
function getAll($link){
   $request = "select pseudo,name,firstname,email,telephone FROM user";

   $resultat=$link->query($request);
header("content-type","application/json");
   while($lignes = $resultat->fetch(PDO::FETCH_ASSOC)){
    $comments[]=$lignes;
   }
   $encode = json_encode($comments);

   echo $encode;
}

if ($method ==="GET") getAll($link);