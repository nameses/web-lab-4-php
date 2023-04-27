<?php
class Person {
    public $Name;
    public $Age;

    public function __construct($name, $age) {
        $this->Name = $name;
        $this->Age = $age;
    }

    public function print_info() {
        echo "Name: {$this->Name}, Age: {$this->Age}" . PHP_EOL;
    }
}

class Student extends Person {
    public $StudentId;

    public function __construct($name, $age, $studentId) {
        parent::__construct($name, $age);
        $this->StudentId = $studentId;
    }

    public function print_info() {
        echo "Name: {$this->Name}, Age: {$this->Age}, StudentId: {$this->StudentId}" . PHP_EOL;
    }
}

class Teacher extends Person {
    public $TeacherId;

    public function __construct($name, $age, $teacherId) {
        parent::__construct($name, $age);
        $this->TeacherId = $teacherId;
    }

    public function print_info() {
        echo "Name: {$this->Name}, Age: {$this->Age}, TeacherId: {$this->TeacherId}" . PHP_EOL;
    }
}

class Singleton {
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

// vars, string vars
$intvar = 30;
$boolvar = false;
$doublevar = 2.11;
$stringvar = "John";

// concatenate
echo "My naame is " . $stringvar . " and I am " . $intvar . " years old.";

// Dereference a variable
echo "<hr>";

$a = 'hello';
$b = 'a';
echo "{$$b}";
$c = 'b';
echo $$$c;

echo nl2br("\r\n");

$a = 'hello';
$b = 'world';
$c = 'a';
echo $$c . ' ' . $b;

echo "<hr>";
// Comparing
$a=100;
$b="100";
echo ($a === $b)?"+":"-";
echo ($a != $b)?"+":"-";
echo ($a !== $b)?"+":"-";

$a=100;
$b=140;
echo ($a > $b)?"+":"-";
echo $a<=>$b;


// Casting vars
$doubleAge = (double)$intvar;
$strvar = strval($intvar);
echo $strvar . PHP_EOL;
echo "<hr>";
// hash table
$hashTable = array(
    1 => "green",
    2 => "red",
    3 => "blue",
    4 => "white"
);

foreach ($hashTable as $key => $value) {
    echo "$key => $value ";
}

echo nl2br("\r\n");
echo count($hashTable);

echo nl2br("\r\n");
if (array_key_exists(3, $hashTable)) {
    echo $hashTable[3];
}
echo "<hr>";
$hashTable = array();

print_r($hashTable);
echo "<hr>";
// split
$input = "apple,banana,cherry";
$fruits = explode(",", $input);
foreach ($fruits as $fruit) {
    echo "$fruit ";
}
echo "<hr>";

// Join an array of strings into a single string
$joined = implode(";", $fruits);
echo $joined;
echo "<hr>";
// objects
$person = new Person("Alice", 25);
$student = new Student("Bob", 20, 1234);
$teacher = new Teacher("Bob", 20, 1234);


// Iterate over a collection of objects using a foreach loop
$people = array($person, $student,$teacher);
foreach ($people as $p) {
    $p->print_info();
}
echo "<hr>";
?>