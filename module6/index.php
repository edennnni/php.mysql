<?php


//fopen
$my_file = fopen("file1.txt","W")

///content
//fclose
fclose($my_file);

$filename = "ds.txt";

$file = fopen($filename,"R");

$size = filesize($filename)

$my_filedata = fread($file,$size);
echo $my_filedata . "<br>";

fclose($file);

//feof - end of line


$my_file = fopen("example.txt","r");

while(!feof($my_file)) {
    echo fgets($my_file). "<br>";
}

//fwrite

$my_file = fopen("file1.txt","w")

$text = "computer programim"

fwrite($my_file, $text);

// a+

$my_file = fopen("data.txt","a+";);

fwrite($my_file, 'data test 2')


?>