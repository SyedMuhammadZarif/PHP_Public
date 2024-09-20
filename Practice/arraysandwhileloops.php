<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple array printer</title>
</head>
<body>
    
    <br>
    <form action="arraysandwhileloops.php" align = "center" method="post">
        <label align = "center">Display Capital</label>
        <br>
        <input type="name" name="Capital" required><br>
        <input type="submit"> 
        <br><br><br><br>
</body>
</html>

<?php

$foods = array("biscuits", "tea", "cake");
$size_food = count($foods);
$int = 0;
//Iteration with while lops
while($int != $size_food){
    echo "<br>{$foods[$int]}";
    $int+=1;
}
//Iteration with foreach loop
echo "<br><br><br>" ;
foreach($foods as $food){
    echo $food ."<br>";
}
echo ("<br><br>");
// Associative arrays

$asso_array = array("USA"=> "Washington D.C", "Japan"=> "Kyoto", "Bangladesh"=>"Dhaka", "India" => "New Delhi");
$query = $_POST["Capital"];
echo ("{$query}: {$asso_array[$query]}<br><br>The Rest: <br>");
foreach($asso_array as $key=>$value){
    if ($key!=$query){
    echo ("{$key}= {$value} <br>");
}}


?>