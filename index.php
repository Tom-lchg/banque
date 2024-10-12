<?php 

include './controler/controler.class.php';
include './controler/client.class.php';

$controler_client = new ClientControler();

if(isset($_GET['action'])) {
    $controler_client->actionClient();
} else {
    $controler_client->render('home');
}