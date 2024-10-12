<?php 

class CompteControler extends AbstractController {
    private $modeleCompte;

    public function __construct()
    {
        $this->modeleCompte = new CompteModele();
    }

    public function actionCompte()
    {
        if(!empty($_GET['action'])) {
            switch($_GET['action']) {
                case 'solde': {
                    $compte = $this->modeleCompte->findClientCompte($_SESSION['idClient']);
                    $this->render('solde', [
                        "compte" => $compte
                    ]);
                    break;
                }

                case 'depot': {
                    if(isset($_POST['deposer'])) {
                        $this->depot($_POST['montant']);
                        header('location: ./index.php?action=solde');
                        break;
                    }
                    $this->render('depot');
                    break;
                }

                case 'retrait': {
                    if(isset($_POST['retrait'])) {
                        $this->retrait($_POST['montant']);
                        header('location: ./index.php?action=solde');
                        break;
                    }
                    $this->render('retrait');
                    break;
                }
            }
        }
    }

    public function depot($montant)
    {
        $compte = $this->modeleCompte->findClientCompte($_SESSION['idClient']);
        $newSolde = (float)$compte->getSolde() + (float)$montant;
        $this->modeleCompte->updateSolde($compte, $newSolde);
        $compte->setSolde((float)$compte->getSolde() + (float)$montant);
    }

    public function retrait($montant)
    {
        $compte = $this->modeleCompte->findClientCompte($_SESSION['idClient']);
        $newSolde = (float)$compte->getSolde() - (float)$montant;
        $this->modeleCompte->updateSolde($compte, $newSolde);
        $compte->setSolde((float)$compte->getSolde() + (float)$montant);
    }
}