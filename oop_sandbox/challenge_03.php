<?php
class Bicycle {
    public $brand;
    public $model;
    public $year;
    private $weight_kg = 0.0;
    protected $description = 'Used bicycle';

    protected $wheels = 2;

    public function name() {
        return $this->brand ." ". $this->model . " (". (string) $this->year . ")";
    }
    public function wheel_details() {
        return "It has " . (string) $this->wheels . " wheels";
    }
    public function set_weight_lbs($weight_lbs) {
      $this->weight_kg = (float) $weight_lbs / 2.2046226218;
      return null;
    }
    public function get_weight_lbs() {
        return (string) (floatval($this->weight_kg * 2.2046226218)) . "lbs";
    }

    public function set_weight_kg($value) {
        $this->weight_kg =  (float) $value;
        return null;
    }

    public function get_weight_kg() {
        return (string) $this->weight_kg . "kg";
    }
}

class Unicycle extends Bicycle {
    protected $wheels = 1;
}

$bike = new Bicycle;
$unicycle = new Unicycle;

echo $bike->name();
// echo $bike->wheel_details();
echo $unicycle->name();
// echo $unicycle->wheel_details();

echo "<h1>challenge_03</h1>";

?>
