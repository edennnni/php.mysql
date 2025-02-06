<?php 

function sum ($nr1, $nr2 ) {

    if ($nr1 > $nr2){
        return $nr1;
    }
    else {
        return $nr2;
    }
}

echo sum(15,30);
echo("<br>");
function qift($x){
    if($x%2==0){
echo "$x eshte qift";
    }
else{
    echo "$x nuk eshte qift";
    }
}

$numri = qift (5); 
echo ($numri);


$students =["Edeni","Nil","Erjoni","Anik"];

array_push($students,"Edeni");

print_r($students);

$count=count($students);

for($i=1;$i<$count;$i++){
    echo $students [$i]. "<br>";
}

array_pop($students);

print_r($students);


array_unshift($students,"Anik");

echo "<br>";

print_r($students);

array_shift($students);

echo "<br>";

$students_slice=array_slice($students, 1,1);
print_r ($students_slice);

echo "<br>";

$mosha=[16,14,13,15,16,14,15];
$shuma=array_sum($mosha);

$count= count($mosha);

print_r($shuma / $count );

?>