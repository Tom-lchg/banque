<?php 

// include du modele & entity client
include './modele/client.class.php';

class ClientControler extends AbstractController{
    private $pdo;
    private $modeleClient;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=banque;charset=utf8mb4', 'root', '');
        $this->modeleClient = new ClientModele();
    }

    public function actionClient()
    {
        if(!empty($_GET['action'])) {
            switch ($_GET['action']) {
                case 'ajouter': {
                    $this->render('inscription');
                    if(!empty($_POST)) {
                        $this->ajouter($_POST);
                        header('location: ./index.php');
                        break;
                    }
                }
            }
        }
    }

    public function ajouter($data)
    {
        $this->modeleClient->ajouter(new ClientEntity(0, $data['nom'], $data['prenom'], $data['telephone'], $data['email'], $data['mdp'], date('y-d-m H-i-s')));
    }
}