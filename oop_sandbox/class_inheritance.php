<h1>class_inheritance</h1>

<?php 
class User {
    var $is_admin = false;
    var $first_name;
    var $last_name;
    var $username;
    
    function full_name() {
        return $this->first_name . " " . $this->last_name;
    }
}

class Customer extends User {
    var $city;
    var $state;
    var $country;
    
    function location() {
        return $this->city . ", " . $this->state . ", " . $this->country;
    }
    
}

class AdminUser extends User {
    var $is_admin = true;

    function full_name() {
        return $this->first_name . " " . $this->last_name . " (Admin)";
    }

}

$u = new User;
$u->first_name = 'Recee';
$u->last_name = "Cup";
$u->username = 'rc_candy';

$c = new Customer;
$c->first_name = 'Butter';
$c->last_name = "Fingers";
$c->username = 'bf_candy';
$c->city = "Philadelphia";
$c->state = "PA";
$c->country = "USA";

echo $u->full_name() . "<br />";
echo $c->full_name() . "<br />";
echo $c->location() . "<br />";

echo get_parent_class($u) . '<br />';
echo get_parent_class($c) . '<br />';

if(is_subclass_of($c, 'User')) {
    echo "Instance is a subclass of User.<br />";
} else {
    echo "Instance is not a subclass of User.<br />";
}

$parents = class_parents($c);
    echo implode(', ', $parents) . '<br />';
?>