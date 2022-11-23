<?php
if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
    require_once('config.php');
    require_once('class/User.class.php');
    $user = new User($_REQUEST['login'], $_REQUEST['password']);
    if($user->login()) {
        echo "Zalogowano poprawnie użytkownika: ".$user->getName();
    } else {
        echo "Błędny login lub hasło";
    } else {
        $twig->display("message.html.twig", ['message'=> "Błędny login lub hasło"]);
    }
} else {
    $twig->display("login.html.twig");
}
?> 