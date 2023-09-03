<?php

class Stage {
    var $height;
    var $width;
    var $fullscreen = false;

}
class Sprite {
    var $x = 0;
    var $y = 0;

    function get_postion() {
        return "({$this->x}, {$this->y})";
    }

    function show() {
        echo $this->get_postion();
    }

    function hide() {
        echo "Display: 'None'";
    }
}

class Player extends Sprite {
    var $movement_allowance = 1;
    var $weapon_skill = 3;
    var $ballistic_skill = 2;
    var $strength = 3;
    var $toughness = 3;
    var $wonds = 3;
    var $initiative = 4;
    var $attacks = 1;
    var $leadership = 3;

    // var $stats = [
    //     'm'=>$this->movement_allowance, 
    //     'ws'=>$this->weapon_skill, 
    //     'bs'=>$this->ballistic_skill, 
    //     's'=>$this->strength,
    //     't'=>$this->toughness, 
    //     'w'=>$this->wonds, 
    //     'i'=>$this->initiative, 
    //     'a'=>$this->attacks, 
    //     'ld'=>$this->leadership,
    // ];
    
    function attack() {
        return (string) $this->strength . " " . (string) $this->weapon_skill . " " . (string) $this->ballistic_skill;
    } 

    function defend() {
        return (string) $this->toughness . " " . (string) $this->wonds;
    }

    function move() {
        return (string) $this->movement_allowance;
    }

}

class User extends Player {
    var $body = 'man';
    var $movement = 'input';

}

class Enemy extends Player {
    var $movement = 'algo';

}

class Ball extends Enemy {
    var $body = 'ball';
    var $color;

}

class Enviroment extends Sprite {
    var $is_solid = true;

    function on_collide() {
        return "collide at: " . $this->get_postion();
    }

}

class Platform extends Enviroment {
    var $body = 'platform';
    
    
}

class Spike extends Enviroment {
    var $body = 'spike';
    function on_collide() {
        return "damage wmwmw";
    }
}


function inspect_class($class_name) {
    $output = '';
  
    $output .= $class_name;
    $parent_class = get_parent_class($class_name);
    if($parent_class != '') {
      $output .= " extends {$parent_class}";
    }
    $output .= "\n";
  
    $class_vars = get_class_vars($class_name);
    ksort($class_vars);
    $output .=  "properties: \n";
    foreach($class_vars as $k => $v) {
      $output .=  "- {$k}: {$v}\n";
    }
  
    $class_methods = get_class_methods($class_name);
    sort($class_methods);
    $output .=  "methods: \n";
    foreach($class_methods as $k) {
      $output .=  "- {$k}\n";
    }
  
    return $output;
  }
  
  $class_names = [
    'Stage',
    'Sprite', 
    'Player', 
    'User', 
    'Enemy', 
    'Ball', 
    'Enviroment', 
    'Platform', 
    'Spike'
];
  foreach($class_names as $class_name) {
    echo nl2br(inspect_class($class_name));
    echo '<br />';
  }
  echo "<hr />";
  

$sprite = new Sprite;
$sprite->x = 10;
$sprite->y = 10;

echo "<pre>" . $sprite->get_postion() . "</pre>";

$u1 = new User;
$ball = new Ball;

echo "Ball attack: " . $ball->attack() . "<br />";
echo "User one defend: " . $u1->defend();
?>