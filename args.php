<?php


print_r($argv);
print_r($_SERVER);

$args = implode(' ', $argv);

echo "exec PHPPATH {$args}";