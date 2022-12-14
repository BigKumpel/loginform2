<?php
session_start();
use Steampixel\Route;

require_once('config.php');
require_once('class/userclass.php');

Route::add('/', function() {
    global $twig;
    $v = array(
        'authorized' => $_SESSION['authorized'],
        'user' => $_SESSION['user'], 
    );
    $twig->display('home.html.twig', ['authorized' => $_SESSION['authorized']]);
});

Route::add('/login', function() {
    global $twig;
    $twig->display('login.html.twig');
});

Route::add('/login', function() {
    global $twig;
    if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
        
        $user = new User($_REQUEST['login'], $_REQUEST['password']);
        if($user->login()) { 
            $_SESSION['authorized'] = true;
            $_SESSION['user'] = $user;   
            $v = array(
                'message' => "Zalogowano poprawnie użytkownika: ".$user->getName(),
                'authorized' => $_SESSION['authorized'],
            );
            $twig->display('message.html.twig', $v);
        } else {
            $twig->display('register.html.twig', ['message' => "Błędny login lub hasło"]);
        }
    } else {
        $twig->display('register.html.twig');
    }
}, 'post');

Route::add('/profile', function() {
    global $twig;
    $user = $_SESSION['user'];
    $fullName = $user->getName();
    $fullName = explode(" ", $fullName);
    $v = array( 'user' => $user, 'firstName' => $fullName[0], 'lastName' => $fullName[1]);
    $twig->display('profile.html.twig', $v);
});

Route::add('/profile', function() {
    global $twig;
    if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])) {
       $user = $_SESSION['user'];
       $user->setFirstName($_REQUEST['firstName']);
       $user->setLastName($_REQUEST['lastName']);
       $user->save();
       $twig->display('message.html.twig', ['message' => "Zapisano zmiany w profilu"]);
    }
}, "post");

Route::add('/login', function() {
    echo "strona logowania";
});

Route::run('/loginform');
?>