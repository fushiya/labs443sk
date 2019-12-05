<?php
//Стандартні функції PHP

// Математичні функції

echo M_PI.'<br />';
echo M_E.'<br />';

$x = -3;
echo abs($x).'<br />';

$x = 12.3932923;
echo round($x).'<br />';//Округлення
echo round($x, 2).'<br />';//Округлення з кількістю знаків після коми
echo round($x, -1).'<br />';//Округлення до сотень наприклат -1 до десятих -2 до сотень -3 до тисяч

echo floor($x).'<br />';//Відкидаємо дробне число
echo ceil($x).'<br />';//Береться найменше ціле число яке буде більше х без дробної частини

echo mt_rand(1, 5).'<br />';//генерує випадкове число від 1 до 5 включно
$arr = [];
for ($i = 0; $i < 10; $i++) $arr[] = mt_rand(1, 100);

print_r($arr);

echo '<br />';
echo min(5, 7, -3, 0, 10, 12, 3);
echo '<br />';
echo max(5, 7, -3, 0, 10, 12, 3);

echo '<br />';
echo base_convert("100", 2, 10);//Переводимо число з одної системи числення в іншу
//перший парамерт число другий з якої системи і третій в яку систему числення

echo '<br />';
echo sin($x).'<br />';
echo cos($x).'<br />';
echo tan($x).'<br />';
echo (1 / tan($x)).'<br />';

$x = 0.5;
echo asin($x).'<br />';
echo acos($x).'<br />';
echo atan($x).'<br />';
echo (M_PI / 2 - atan($x)).'<br />';

echo rad2deg(asin($x)).'<br />';//перевід з радіанів у градуси
echo deg2rad(30).'<br />';//перевід з градусів у радіани

//Строкові функції

$s_1 = 'Hello World!';
$s_2 = 'Привіт, світ!';
echo $s_1[1].'<br />';
echo $s_2[1].'<br />';

//Повертаємо кількість байтів рядка
echo strlen($s_1).'<br />';
echo strlen($s_2).'<br />';

//Повертаємо кількість байтів рядка для кирилиці
echo mb_strlen($s_1).'<br />';
echo mb_strlen($s_2).'<br />';

//повертае індекс підрядка у рядку
echo strpos($s_1, 'llo').'<br />';
if (strpos($s_1, 'Hell')!== false ) echo 'Підрядок знайдено';
else echo 'Підрядок не знайдено';
echo '<br />';

//повертає підрядок з рядка (звідки, скільки символів)
echo substr($s_1, 3, 2).'<br />';
echo substr($s_1, 3).'<br />';
//Для роботи з кирилецею перед методом добавляємо mb_ але ці методи значно повільніше працюють
echo mb_substr($s_2, 3).'<br />';

$email = '       abc@abc.com      ';
echo $email.'<br />';
//Обрізує всі пробіли зпочатку і з кінця
echo trim($email).'<br />';

//заміна підрядка на інший пдрядок у заданому рядку (заміняємий рядок, на який треба замінити, у якому треба замінити)
echo str_replace('и', 'а', $s_2).'<br />';
$text = "Привіт, %name%! Ви зареєструвалися на сайті %site%!<br />";
//Заміна масивом
echo str_replace(['%name%', '%site%'], ['Іван', 'rutor.ru'], $text);

//Переводить всі символи у нижній регістр
echo mb_strtolower($s_1).'<br />';
//Переводить всі символи у верхій регістр
echo mb_strtoupper($s_1).'<br />';

//приводить розділену строку до однієї строки через +
echo '<a href="index.php?a='.urlencode('ttt ttt & ttt').'">Ссилка</a><br />';
//Зворотня операція
echo urldecode('ttt+ttt+%26+ttt').'<br />';

$s_3 = '<a><img>"\' &';
//конвертує html теги у простий текст
echo htmlspecialchars($s_3, ENT_QUOTES).'<br />';

//видаляє з рядка всі теги крім тегів заданих у другому параметрі
echo strip_tags($s_3, '<img>').'<br />';

//шифрує рядок у мд5
echo md5($s_3).'<br />';

//функція генерує нам випадкову строку
echo uniqid().'<br />';

$text = 'тест тест тест тест тест тест тест тест тест.';
echo $text.'<br />';
//робить перенос символів на новий рядок через вказану кількість символів. тобто вставляється \n
echo wordwrap($text, 20).'<br />';

//функція заміняє всі \n на тег <br />
echo nl2br(wordwrap($text, 20)).'<br />';

$m_1 = "68";
$m_2 = "75.43";

//вивід чисел з плаваючою точкою через строку
echo sprintf('%.2f', $m_1).'<br />';
echo sprintf('%.2f', $m_2).'<br />';

//Функції для роботи з масивами

$a = [5, 5, 7, 2, 3, 7, 0, 5];
print_r($a);
echo '<br />';
//видаляє з масива всі повторні елементи зберігаючи при цьому індекси
$a = array_unique($a);
print_r($a);

/*
$x = false;
if (is_array($x)) foreach ($x as $v) echo $v;
*/

echo '<br />';
//перемішує масив
shuffle($a);
print_r($a);
echo '<br />';
//робить реверс масиву
print_r(array_reverse($a));

echo '<br />';
//міняє ключі і значення місцями
print_r(array_flip($a));

echo '<br />';
$a = ['name' => 'Igor', 'age' => '26'];
//повертає всі значення без ключів у вигляді масиву
print_r(array_values($a));

echo '<br />';
//повертає всі ключі без значень у вигляді масиву
print_r(array_keys($a));

echo '<br />';
$list_1 = [5, 7, 8];
$list_2 = [10, 8, 20];
$list = $list_1 + $list_2;
print_r($list);
echo '<br />';
//конкатенує масиви
$list = array_merge($list_1, $list_2);
print_r($list);

//створює список з чисел вказаного діапазону
$list = range(1, 100);
echo '<br />';
//print_r($list);

//for ($i = 0; $i < 100; $i++) echo 'Hello';
//foreach(range(1, 100) as $v) echo 'Hello';

//повертає підмасив з масиву
$list = array_slice($list, 10, 5);
print_r($list);

//перемішуємо
shuffle($list);
echo '<br />';
print_r($list);
echo '<br />';
//сортуємо по зростанню
sort($list);
print_r($list);
echo '<br />';
//сортуємо по спаданню
rsort($list);
print_r($list);

echo '<br />';
$list = ['1' => 5, '2' => 0, '4' => 10, 'name' => 12];
//сортує по значеннях по зростанню
asort($list);
print_r($list);
echo '<br />';
//сортує по значеннях по спаданню
arsort($list);
print_r($list);

//Сорування за зростанням спочатку елементів які не кратні 10 а потім які кратні
function mySort($a, $b) {
    if ($a % 10 == 0 && $b % 10 != 0) return 1;
    if ($a % 10 != 0 && $b % 10 == 0) return -1;
    return ($a <=> $b);
}

$list = [30, 40, 25, 20, 12, 15, 50, 40];
uasort($list, 'mySort');
echo '<br />';
print_r($list);
echo '<br />';
//Функції для роботи з датою і часом
//функція повертає число у мілісекундах від 01.01.1970 00:00
$start = microtime(true);
echo $start.'<br />';
//функція повертає число у секундах від 01.01.1970 00:00
$time = time();
echo $time.'<br />';

echo 'Поточній час: '.date('d.m.Y H:i:s');

//побудова необхідної дати (години, минути, секунди, місяць, день, рік)
$time = mktime(2, 0, 30, 5, 10, 2017);

echo '<br />Отримана дата і час: '.date('d.m.Y H:i:s', $time).'<br />';

//перевід дати в секунди
$time = strtotime('12.05.2016');
echo $time.'<br />';
echo date("Y.m.d", $time);

$d = 32;
$m = 2;
$y = 2016;
echo '<br />';
//перевіряє коректність дати
if (checkdate($m, $d, $y)) echo 'Дата крректна';
else echo 'Дата не коректна';

function getGM($local) {
    //параметр "Z" повертає різницю між поточним часом и грінфічем у секундах
    //аким чином можно знати точний час у часовому поясі
    $offset = date("Z", $local);
    return $local - $offset;
}
//отримуємо час відносно часового поясу
function getLM($gm, $offset) {
    return $gm + $offset;
}

echo '<br />';

echo date('Y.m.d H:i:s', getGM(time()));
echo '<br />';
echo date('Y.m.d H:i:s', getLM(getGM(time()), 3600 * 2));

echo '<br />Час работи скріпта: '.(microtime(true) - $start);


//Функції для роботи з файлами
//а+ - режим для читання і запису
$handler = fopen('a.txt', 'a+');
//зчитуємо відповідну кількість символів
echo fread($handler,5).'</br>';
$count = 1;
$str = '';
while(!feof($handler)) {
    $str .= fread($handler, $count);
}
echo $str;
//echo fread($handler, 300000000);
//устанавлюємо позицію у 0
fseek($handler, 0);
echo '<br />';
//зчиуємо до кінця файла
echo fread($handler, filesize('a.txt'));
//запис у файл рядка
//fwrite($handler, "\nNew String");
fclose($handler);

//професійний підхід по роботі з файлами
//отримуємо весь контент файлу
echo '<br />';
$str = file_get_contents('a.txt');
echo $str.'<br />';

//записуємо у кінець файлу
$str = file_put_contents('a.txt', file_get_contents('a.txt').' Hello World');
//копіюємо вмістиме файла а в файл б
copy('a.txt', 'b.txt');
//пеерейменовуємо файл
rename('b.txt', 'new.txt');
//видаляємо файл
unlink('new.txt');

echo '<br />';
//створюємо темповий файл який живе доки працює скріп
$handler = tmpfile();

fwrite($handler, 'abc');
fseek($handler, 0);
echo fread($handler, 3);
//fclose($handler);

//Парсінг іні файлів
//використовуються в основному здля збереження налаштувань та язикових констант
$arr = parse_ini_file('config.ini', true);

print_r($arr);

echo '<br />';
echo $arr['Config']['site'];

//Права доступа до файлів
$f = fopen(__FILE__, 'r');
//Типи блокірово LOCK_EX
//Бітова маска LOCK_NB
//flock - функція яка відповідає за блокування файлів
//в основному використовується щоб уникнути одночасного виконання скріпта
if (!flock($f, LOCK_EX | LOCK_NB)) {
    die('Script is already running');
}
echo fileowner('a.txt').'<br />';
echo filegroup('a.txt').'<br />';
echo decoct(fileperms('a.txt'));

chown('a.txt', 1000);
chmod('a.txt', 0755);
sleep(3);

// Функції для работи з каталогами
mkdir('new dir');//створюємо директорію
mkdir('new dir/new/dir',0755,true);//примусове створення директорій в директоріях
rmdir('new dir');//видаляємо директорію

$arr = glob('*.php');//отримуємо масив всіх файлів з розширенням пхп
print_r($arr);
//рекурсивна функція отримання всіх елементів директорії
function printDir($folder, $space = '') {
    $files = scandir($folder);//отримуємо вмістиме директорії фодер
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') continue;
        $f = $folder.'/'.$file;
        echo $space.$file.'<br />';
        if (is_dir($f)) printDir($f, $space.'&nbsp;&nbsp;');
    }
}
echo '<br />';
printDir('D:\WORK\111');

//функція перевіряє чи існує такий файл (1, )
echo file_exists('index.php');

// Функції для работи з DNS
//отримуємо ip адрес хоста
$ip_address = gethostbyname('vk-tour.com');
echo $ip_address.'<br />';
//отримуємо імя хоста ервера на якому розміщений сайт по ip
$hostname = gethostbyaddr($ip_address);
echo $hostname.'<br />';

//Запуск зовнішніх програм

$str = `dir`;

echo iconv('CP866', 'UTF-8', $str).'<br />';

//повертає останній рядок від комани dir
$str = exec('dir');

echo iconv('CP866', 'UTF-8', $str).'<br />';
//запускаємо на виконання програму
//exec('D:\Program Files\ScreenMarker.exe');

// Функція phpinfo() - повертає конфігурацію пхп
//phpinfo();

//Регулярні вирази
//В ПХП регулярний вираз потрібно обрамляти повторним символом, як правело це /
$reg = '/a \dM/';
$str = 'a 8M';
//виконання регулярного виразу
echo preg_match($reg, $str, $matches);
echo '<br />';
//$matches - масив у який попадають всі найдені збіги
print_r($matches);
$str = 'a M';
echo preg_match($reg, $str);

$reg = '#a \d b#';
$str = 'abca 8 b3333';
echo '<br />'.preg_match($reg, $str);

// \D - любий символ який не являється цифрою
$reg = '#a \D b#';
$str = 'abca   b3333';
echo '<br />'.preg_match($reg, $str);

// \w - відповідає або букві або цифрі
$reg = '#a \w b#';
$str = 'abca d b3333';
echo '<br />'.preg_match($reg, $str);

// \W - відповідає всі символам крім букви або цифри
$reg = '#a \W b#';
$str = 'abca   b3333';
echo '<br />'.preg_match($reg, $str);

// \s - відповідає за всі пробільні имволи(табуляції, поверненя каретки і т.д)
$reg = '#a \s b#';
$str = "abca \t b3333";
echo '<br />'.preg_match($reg, $str);

// \S - любий не пробільний символ
$reg = '#a \S b#';
$str = "abca d b3333";
echo '<br />'.preg_match($reg, $str);

// \n - кожен спец символ відповідає сам за себе
$reg = '#a \n b#';
$str = "abca \n b3333";
echo '<br />'.preg_match($reg, $str);

// . - відповідає любому символу
$reg = '/a . b/';
$str = 'a . b';
echo preg_match($reg, $str).'<br />';

// ^ - вказуємо на початок рядка
$reg = '/^ab/';
$str = 'aba';
echo preg_match($reg, $str).'<br />';

// $ - вказуємо на кінець рядка
$reg = '/ab$/';
$str = 'abaaaab';
echo preg_match($reg, $str).'<br />';

// задаємо інтервали значень
$reg = '/a [a-z][0-5] b$/';
$str = 'a c6 b';
echo preg_match($reg, $str).'<br />';

$reg = '/a [^a-z] b$/';
$str = 'a 6 b';
echo preg_match($reg, $str).'<br />';

$reg = '/a ([a-z]a\d) (b)$/';
$str = 'a aa5 b';
echo preg_match($reg, $str, $matches).'<br />';
print_r($matches);
echo '<br />';

$reg = '/a ([a-z]a)* b$/';
$str = 'a  b';
echo preg_match($reg, $str).'<br />';

$reg = '/a ([a-z]a)+ b$/';
$str = 'a aa b';
echo preg_match($reg, $str).'<br />';

$reg = '/a a? b$/';
$str = 'a  b';
echo preg_match($reg, $str).'<br />';

$reg = '/a \d{3} b$/';
$str = 'a 539 b';
echo preg_match($reg, $str).'<br />';

$reg = '/a \d{3,} b$/';
$str = 'a 5933 b';
echo preg_match($reg, $str).'<br />';

$reg = '/a \d{3,5} b$/';
$str = 'a 59999 b';
echo preg_match($reg, $str).'<br />';

$reg = '/a \d{3,5} b$/i';
$str = 'A 59999 b';
echo preg_match($reg, $str).'<br />';

$reg = '/a\s\d{3,5} b$/ix';
$str = 'A 59999b';
echo preg_match($reg, $str).'<br />';

$reg = '/ab$/m';
$str = "ab\nddd";
echo preg_match($reg, $str).'<br />';

$reg = '/"(.*?)"/m';
$str = 'abc "23" abc "45"';
echo preg_match_all($reg, $str, $matches).'<br />';
print_r($matches);

$reg = '/[a-z0-9_]+(\.[a-z0-9_-]+)*@([0-9a-z][0-9a-z]*\.)+([a-z]){2,4}/';
$email_1 = 'abc@mail.ru';
$email_2 = 'abc@mail.mail.com';
$email_3 = 'abc.dd_dd@mail.mail.com';
$email_4 = 'abc';
$email_5 = 'abc@sdfsd';
$email_6 = 'ddd abc@sdfsd.ru ddd';
echo preg_match($reg, $email_1).'<br />';
echo preg_match($reg, $email_2).'<br />';
echo preg_match($reg, $email_3).'<br />';
echo preg_match($reg, $email_4).'<br />';
echo preg_match($reg, $email_5).'<br />';
echo preg_match($reg, $email_6).'<br />';

$text = "Пишіть мені на e-mail abc@abc.abc.ru.";

$text = preg_replace($reg, 'СТОП e-mail', $text);

echo $text.'<br />';

$date = '12.07.2017';
$reg = '/(\d{2})\.(\d{2})\.(\d{4})/';
echo preg_replace($reg, '$2.$1.$3', $date);
