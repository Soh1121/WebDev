<?php

$i = 0;
while($i < 10){
    echo $i."<br>";
    $i++;
}

$i = 0;
$family = array("Rob", "Kirsten", "Tommy", "Ralphie");
while($i < sizeof($family)){
    echo $family[$i]."Percival, ";
    $i++;
}

/*
for($i = 2; $i < 30; $i++){
    echo $i,",";
}
echo $i."<br><br>";

for($i = 10; $i >= 0; $i--){
    if($i==0){
        echo $i;
    } else {
        echo $i,",";
    }
}

echo "<br><br>";

$family = array("Rob", "Kirsten", "Tommy", "Ralphie");
for($i = 0; $i < sizeof($family); $i++){
    if($i == sizeof($family) - 1){
        echo $family[$i];
    } else {
        echo $family[$i],", ";
    }
}

echo "<br><br>";

foreach($family as $key => $value){
    // echo $key.": ".$value.", ";
    $family[$key] = $value." Percival";
    echo $family[$key].", ";
}
*/


?>