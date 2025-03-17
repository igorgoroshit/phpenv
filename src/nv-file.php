<?php

$pwd  = getcwd();
$name = '.nv';


function findFile($dir, $name) {

    while($dir !== '') {

        if( file_exists("$dir/$name") ) 
        {
            return "$dir/$name";
        }

        $pos = strrpos($dir, '/');

        if($pos !== false) {
            $dir = substr($dir, 0, $pos);
        }

    }

    return false;
}
echo "PWD: $pwd, NAME: $name\n";
//print_r(findFile($pwd, $name));

$file = findFile($pwd, $name);

if(!$file) {
    echo "File $name not found\n";
    exit();
}

echo "Settings:\n";
$settings = parse_ini_file($file);
print_r($settings);


NV::