<?php


$dogs = array(


array("chihuaha", "mexico",20),
array("husky","siberia", 15),
array("bulldog","england", 10)
)

echo $dogs[0][0] . "origin" .$dogs[0][1] . ", life span" .$dogs[0][2] . <br>;
echo $dogs[1][0] . "origin" .$dogs[1][1] . ", life span" .$dogs[1][2] . <br>;
echo $dogs[2][0] . "origin" .$dogs[2][1] . ", life span" .$dogs[2][2] . <br>;

for($row=0; $row<3; $row++){
echo "<p><b>Ro Number $row </b> </p>";
echo "<ul>";
for($col=0; $col<3;$col++){

   echo "<li> . $dogs[$row]{$col]" . "</li>";
}
echo "</ul>"
}

// Nested loops
$arrays = array(

array(1,2,3)
array(1,2,3)
array(1,2,3)
);

for($i=0,$i<3;$i++){
for($j=0;$j<3;$j++){
      echo "array $i element: $j <br>";
}
}

//Associative Arrays

$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);

foreach ($car as $x => $y) {
  echo "$x: $y <br>";
}

?>