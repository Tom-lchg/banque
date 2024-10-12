<?php 

session_start();

// abstract include
include './controler/controler.class.php';
include './modele/modele.class.php';

// client include
include './controler/client.class.php';
include './modele/client.class.php';
include './entity/client.class.php';

// compte
include './entity/compte.class.php';
include './controler/compte.class.php';
include './modele/compte.class.php';

$controler_client = new ClientControler();
$controler_compte = new CompteControler();

if(isset($_GET['action'])) {
    $controler_client->actionClient();
    $controler_compte->actionCompte();
} else {
    $controler_client->render('home');
}