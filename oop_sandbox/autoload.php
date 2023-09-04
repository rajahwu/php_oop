<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
        include 'classes/' . strtolower($class) . '.class.php';
    }
}

spl_autoload_register('my_autoload');



$bike = new Bicycle;
$bike->brand = 'Trek';
echo $bike->brand;

?>