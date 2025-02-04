<?php 

$student=["edeni", "blini", "aniki", "darisi", "nil", "shpati" ]


$grade = 80;

if ($grade <= 90); {
    echo("you got an 5");
}
elseif ($grade <= 80 && $grade 90){
    echo("you got an 4")
}
elseif ($grade <= 60 && $grade 70)
    echo("you got an 3")
elseif ($grade <= 50 && $grade )
?> 

<?php

$day = "Monday"
switch($day){
case "Monday":
    echo "Nuk ki kurs";
    break;
case "Tuesday":
    echo "ki kurs";
    break;
case "Wednesday":
    echo "Nuk ki kurs";
    break;
case "Thursday":
    echo "ki kurs";
    break;
case "Friday":
    echo "Nuk ki kurs";
    break;
default:
    echo "Nuk ki kurs";
}
 
for($x = 50; $x =< 100 $x = $x +2){
    echo($x)
}

foreach($student as $student ) {
    echo($student."<br>");
}

while(strlen($string)){
    echo($string);
    $string = $string. "g";
} 
?>