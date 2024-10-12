<?php 

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
                case 'inscription': {
                    if(!empty($_POST)) {
                        $this->inscription($_POST);
                        header('location: ./index.php?action=connexion');
                        break;
                    }
                    $this->render('inscription');
                    break;
                }

                case 'connexion': {
                    if(!empty($_POST)) {
                        $this->connexion($_POST['email'], $_POST['mdp']);
                        $this->modeleClient->hasAccount();
                        header('location: ./index.php');
                        break;
                    }
                    $this->render('connexion');
                    break;
                }

                case 'deconnexion': {
                    $this->deconnexion();
                    header('location: ./index.php');
                    break;
                }
            }
        }
    }

    public function inscription($data)
    {
        $this->modeleClient->ajouter(new ClientEntity(0, $data['nom'], $data['prenom'], $data['telephone'], $data['email'], $data['mdp'], date('y-d-m H-i-s')));
    }

    public function connexion($email, $mdp)
    {
        $clients = $this->modeleClient->getAll();

        foreach($clients as $client) {
            if($email === $client->getEmail()) {
                if($mdp === $client->getMdp()) {
                    $_SESSION['idClient'] = $client->getId();
                    $_SESSION['emailClient'] = $client->getEmail();
                    $this->modeleClient->hasAccount();
                    header('location: ./index.php');
                }
            }
        }
    }

    public function deconnexion()
    {
        $_SESSION = [];
        session_destroy();
    }
}