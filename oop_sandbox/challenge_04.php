<?php
class Bicycle {
    public static $instance_count = 0;
    public $brand;
    public $model;
    public $year;
    public $category;
    private $weight_kg = 0.0;
    protected $description = 'Used bicycle';

    protected static $wheels = 2;

    public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

    public static function create() {
        $class_name = get_called_class();
        $obj = new $class_name;
        // $obj = new static;
        self::$instance_count++;
        return $obj;
    }


    public function name() {
        return $this->brand ." ". $this->model . " (". (string) $this->year . ")";
    }
    public static function wheel_details() {
        return "It has " . (string) static::$wheels . " wheels";
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
    protected static $wheels = 1;

    public function name() {
    return "Unicycle " . parent::name();
    }
}

$bike = new Bicycle;
$bike->brand = "cool bike";
$bike->model = "shinny";
$bike->year = "2018";

$unicycle = new Unicycle;
$unicycle->brand = "cool bike";
$unicycle->model = "shinny";
$unicycle->year = "2018";


echo $bike->name() . "<br />";
echo $bike->wheel_details() . "<br />";
// echo $bike->wheel_details();
echo $unicycle->name() . "<br />";
echo $unicycle->wheel_details() . "<br />";
// echo $unicycle->wheel_details();
echo Bicycle::$instance_count . "<br />";
echo Unicycle::$instance_count . "<br />";
$bk = Bicycle::create();
$uk = Unicycle::create();
echo 'Bicycle count: ' . Bicycle::$instance_count . "<br />";
echo 'Unicycle count' . Unicycle::$instance_count . "<br />";
echo "<hr />";

echo "Categories: " . implode(', ', Bicycle::CATEGORIES) . "<br />";
$bike->category = Bicycle::CATEGORIES[0];
echo 'Category: ' . $bike->category . "<br />";

echo $bk->wheel_details() . "<br />";
echo $uk->wheel_details() . "<br />";

echo "<h1>challenge_04</h1>";

?>
