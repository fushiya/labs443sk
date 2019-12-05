<?php
class User {

    public $name = 'User';
    public $email;

}

$user_1 = new User();
echo $user_1->name,'<br />';
echo $user_1->email,'<br />';

$user_1->email = 'abc1@mail.ru';
echo $user_1->email.'<br />';

$user_2 = new User();
$user_2->name = 'Іван';
$user_2->email = 'abc2@mail.ru';
echo $user_2->name.'<br />';
echo $user_2->email.'<br />';


class User2 {

    public $name = 'User';
    public $email;

    public function __construct($name = false, $email = false) {
        if ($name) $this->name = $name;
        if ($email) $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function __destruct() {
        echo 'Видаляємо обєкт</br>';
    }

}

$user = new User2('Іван', 'abc@mail.ru');

echo $user->name.'<br />';
echo $user->email.'<br />';

echo $user->getName().'<br />';
echo $user->getEmail().'<br />';

$user->setName('Тарас');
$user->setEmail('test@mail.ru');

echo $user->getName().'<br />';
echo $user->getEmail().'<br />';

class User3 {

    public $id = 0; // доступ є звідки завгодно
    protected $name = 'User'; // доступ є з класу і з всіх його нащадків
    private $email; // доступ є лиз з класу

    public function __construct($name = false, $email = false) {
        if ($name) $this->name = $name;
        if ($email) $this->email = $email;
        $this->id = $this->getId();
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    private function getId() {
        return uniqid();//генеруємо унікальний ідентифікатор
//        return $this->id;
    }

    public function __destruct() {
        echo 'Видаляємо обєкт</br>';
    }

}

$user = new User3();
echo $user->id.'<br />';
echo $user->getName().'<br />';

//Статичні методи
class Math {

    public const PI = 3.1415926;
    private static $counter = 0;

    public static function sin($x) {
        self::$counter++;
        return sin($x);
    }

    public static function pi2() {
        self::$counter++;
        return self::PI ** 2;
    }

    public static function getCounter() {
        return self::$counter;
    }

}

echo Math::sin(5).'<br />';
echo Math::pi2().'<br />';
echo Math::pi2().'<br />';
echo Math::getCounter().'<br />';
echo Math::PI.'<br />';

//Зарезервовані методи

class Test {
    public $x = 5;
}
class Request {

    public $t;
    private $data;

    public function __construct(Test $t) {
        $this->t = $t;
        $this->data = $_REQUEST;
    }

    public function __get($name) {
        if (isset($this->data[$name])) return $this->data[$name];
        return null;
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __isset($name) {
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }

    public function __toString() {
        $s = '';
        foreach ($this->data as $k => $v) $s .= "$k = $v; ";
        return $s;
    }

    public function __clone() {
        $this->t = clone $this->t;
    }

    public function __call($method, $args) {
        echo "$method не існує, тому реалізувати його не представляється можливим!<br />";
        echo "Передані параметри: ".print_r($args, true);
    }

}

$request = new Request(new Test());

echo $request->a.'<br />';

$request->a = 5;
echo $request->a.'<br />';

echo isset($request->a).'<br />';

echo $request.'<br />';

$r = $request;
$request->a = 8;
echo $r->a.'<br />';

$r = clone $request;
$request->a = 10;
echo $r->a.'<br />';

echo '---------------------<br />';
echo $request->t->x.'<br />';
$request->t->x = 15;
echo $r->t->x.'<br />';

echo '---------------------<br />';

echo $request->notFound(5, 7, 98).'<br />';

unset($request->a);
echo $request->b.'<br />';

//Сереліалізація обєктів
class User4 {

    public $email;
    public $password;
    public $lt;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
        $this->lt = time();
    }

    public function __sleep() {
        return ['email', 'lt'];
    }

    public function __wakeup() {
        $this->lt = time();
    }
}

$user = new User4('abc@mail.ru', '123');
print_r($user);
//$str = serialize($user);
//$fp = fopen($user->email, 'w');
//fwrite($fp, $str);
//fclose($fp);
$str = file_get_contents($user->email);
sleep(2);
$u = unserialize($str);
print_r($u);


//Наслідування та абстрактні класи
abstract class Shape {

    protected $x;
    protected $y;

    public function __toString() {
        return print_r($this, true);
    }

}

class Circle extends Shape {

    private $r;

    public function __construct($x, $y, $r) {
        $this->x = $x;
        $this->y = $y;
        $this->r = $r;
    }

    public function draw() {
        echo 'Малюємо коло з координатами центру '.$this->x.' и '.$this->y;
        echo '<br />Радиус '.$this->r;
    }
}

class Rectangle extends Shape {

    private $w;
    private $h;

    public function __construct($x, $y, $w, $h) {
        $this->x = $x;
        $this->y = $y;
        $this->w = $w;
        $this->h = $h;
    }

    public function draw() {
        echo 'Малюємо прямокутник з координатами лівого верхнього кута '.$this->x.' і '.$this->y;
        echo '<br />Ширина '.$this->w.', Висота '.$this->h;
    }
}

$circle = new Circle(5, 8, 10);
$rect = new Rectangle(20, 20, 40, 10);
$r = new Rectangle(210, 220, 430, 102);
$list = [$circle, $rect, $r];
foreach ($list as $l) {
    //if ($l instanceof Circle) $l->drawCircle();
    //elseif ($l instanceof Rectangle) $l->drawRect();
    $l->draw();
    echo '<br />';
}

//Інтерфейси
interface Draw {

    public function draw();

}

abstract class Shape1 implements Draw {

    protected $x;
    protected $y;

    public function __toString() {
        return print_r($this, true);
    }

}

class Circle1 extends Shape {

    private $r;

    public function __construct($x, $y, $r) {
        $this->x = $x;
        $this->y = $y;
        $this->r = $r;
    }

    public function draw() {
        echo 'Малюємо коло з координатами центру '.$this->x.' и '.$this->y;
        echo '<br />Радіус '.$this->r;
    }

}

class Rectangle1 extends Shape {

    private $w;
    private $h;

    public function __construct($x, $y, $w, $h) {
        $this->x = $x;
        $this->y = $y;
        $this->w = $w;
        $this->h = $h;
    }

    public function draw() {
        echo 'Малюємо прямокутник з координатами лівого верхнього кута '.$this->x.' і '.$this->y;
        echo '<br />Ширина '.$this->w.', Висота '.$this->h;
    }
}

$circle = new Circle1(5, 8, 10);
$rect = new Rectangle1(20, 20, 40, 10);
$r = new Rectangle1(210, 220, 430, 102);
$list = [$circle, $rect, $r];
foreach ($list as $l) {
    //if ($l instanceof Circle) $l->drawCircle();
    //elseif ($l instanceof Rectangle) $l->drawRect();
    $l->draw();
    echo '<br />';
}

//Трейти
trait Id {

    protected $id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

}

trait Name {

    protected $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}

class User5 {

    use Id, Name;
}

class Cat {

    use Id, Name;
}

class Article {

    use Id;
}

$user = new User5();
$user->setId(10);
$user->setName('Олег');
echo $user->getId().'<br />';
echo $user->getName();


//Пространство імен
use com\myroniv\User6;
use com\ivan\User7 as GoogleUser;
require_once 'a.php';
require_once 'b.php';

$user = new User6();
$user->name = 'Taras';
echo $user->name.'<br />';

$g_user = new GoogleUser();
$g_user->email = 'abc@mail.ru';
echo $g_user->email.'<br />';

$user = new com\ivan\User7();
$user->email = '123@mail.ru';
echo $user->email.'<br />';


