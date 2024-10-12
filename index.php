<?php 

session_start();

// abstract include
include './controler/controler.class.php';
include './modele/modele.class.php';

// client include
include './controler/client.class.php';
include './modele/client.class.php';
include './entity/client.class.php';

$controler_client = new ClientControler();

if(isset($_GET['action'])) {
    $controler_client->actionClient();
} else {
    $controler_client->render('home');
}