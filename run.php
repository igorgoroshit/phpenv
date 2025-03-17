<?php

require __DIR__ . '/vendor/autoload.php';


use Envy\PHPEnvDriver;

$d = new PHPEnvDriver();

echo $d->getVersion();

print_r($d->getVersions());

$dir =  '/Users/igorg/Projects/mysms';//getcwd();
echo "DIR IS $dir\n";
$file = $d->getVersionFilePath($dir);
$version = $d->getVersionForPath($dir);
echo "$version (set by $file)\n";