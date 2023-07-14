<?php

//Forcer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors',true);
ini_set('display_startup_errors',true);

include ('../include.php');

// Récupérer les paramètres "route" et "action" de l'url
$route='a';
if (isset($_GET['route'])) {
    $route=$_GET['route'];
} else {
    $route = 'menu';
}

$action='';
if (isset($_GET['action'])) {
    $action=$_GET['action'];
}

switch($route){
    case 'menu':
        MenuController::switchAction($action);
        break;

    case 'chat':
        ChatController::switchAction($action);
        break;
    
    case 'settings':
        SettingsController::switchAction($action);
        break;
    
    case 'mobs':
        MobsController::switchAction($action);
        break;

    case 'challenge':
        ChallengeController::switchAction($action);
        break;
    
    default:
        echo '<p>La route spécifiée ('.$route.') n\'existe pas !</p>';
        //à modifier avant l'hébergement
    break;
}