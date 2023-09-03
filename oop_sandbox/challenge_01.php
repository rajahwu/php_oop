<?php
class Bicycle {
    var $brand;
    var $model;
    var $year;
    var $description = 'Used bicycle';
    var $weight_kg = 0.0;

    function name() {
        return $this->brand ." ". $this->model . " (". $this->year . ")";
    }
    function set_weight_lbs($weight_lbs) {
      $this->weight_kg = $weight_lbs / 2.2046226218;
      return null;
    }
    function weight_lbs() {
        return floatval($this->weight_kg * 2.2046226218);
    }
}



$bike1 = new Bicycle;
$bike1->brand = 'Trek';
$bike1->model = "Emonda";
$bike1->year = '2017';

$bike2 = new Bicycle;
$bike2->brand = 'Cannondale';
$bike2->model = "Synapse";
$bike2->year = '2016';

$object_vars = get_object_vars($bike1);
echo $bike1->name() . ":<br />";
echo "<pre>";
print_r($object_vars);
echo "</pre>";

echo "Object vars";
echo "<br />";
echo "<b>Name: </b>";
$object_vars = get_object_vars($bike1);
echo $bike1->name();
echo "<br />";
echo "<b>weight(50) => </b> ";
echo $bike1->set_weight_lbs(50), $bike1->weight_kg;
echo "<br />";
echo "<b>weight_kg => </b> {$bike1->weight_kg} | <b>weight_lbs => </b> ";
echo $bike1->weight_lbs();
echo "<br />";
echo "<pre>";
print_r($object_vars);
echo "</pre>";

if(method_exists('Bicycle', 'name')) {
    echo "Property name exist in Bicycle class.<br />";
} else {
    echo "Property name not exist in Bicyle class.<br />";
}


?>