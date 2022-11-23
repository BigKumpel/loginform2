<?php
require_once('vendor/autoload.php');

$loader = new Twig\Loader\FilesystemLoader('./templates');

$twig = new Twig\Environment($Loader);

$twig->display("index.html.twig", {'name' => "Paweł"});
?>