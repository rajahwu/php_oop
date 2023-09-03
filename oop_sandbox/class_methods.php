<?php 
    class Student {
        var $first_name;
        var $last_name;
        var $country = 'None';

        function say_hello() {
            return 'Hello ';
        }

        function full_name() {
            return $this->first_name . " " . $this->last_name;
        }
    }

$student1 = new Student;
$student1->first_name = 'Lucy';
$student1->last_name = 'Ricardo';

$student2 = new Student;
$student2->first_name = 'Ethel';
$student2->last_name = 'Mertz';

echo $student1->say_hello() . " " . $student1->full_name() . "<br />";
echo $student2->say_hello() . " " . $student2->full_name() . "<br />";

$class_methods = get_class_methods('Student');
echo "Class methods:<br />";
echo "<pre>";
print_r($class_methods);
echo "</pre>";

if(method_exists('Student', 'say_hello')) {
    echo "Method say_hello() exist in Student class.<br />";
} else {
    echo "Method say_hello() not exist in Student class.<br />";
}

?>