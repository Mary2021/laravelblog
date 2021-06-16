<!-- <h1>Some ramdom number:<?=rand(1, 100);?></h1> -->
<?php

include ('hello.php');
require ('hello.php');

spl_autoload_register(function($class) {
    var_dump($class);
    $parts = explode('\\', $class);
    array_shift($parts);
    $path= './src/' . implode('/', $parts). '.php';
    var_dump($path);
    });
require ('src/Animals/Cat.php');

$cat = new \App\Animals\Cat();

var_dump($cat);

require ('src/Animals/Dog.php');

$dog = new \App\Animals\Dog();

var_dump($dog);

require_once "vendor/autoload.php";

$router = new AltoRouter();

var_dump($router);
var_dump($_SERVER);

$router->map( 'GET', '/', function() {
    echo "home";
});

$router->map( 'GET', '/about', function() {
    echo "about us";
});

$match =$router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}