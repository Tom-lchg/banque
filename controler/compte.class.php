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
                        $this->depot($_POST['montant'], $_SESSION['idClient']);
                        header('location: ./index.php?action=solde');
                        break;
                    }
                    $this->render('depot');
                    break;
                }

                case 'retrait': {
                    if(isset($_POST['retrait'])) {
                        $canIdoIt = $this->retrait($_POST['montant']);
                        var_dump($canIdoIt);
                        if(!$canIdoIt) {
                            header('location: ./index.php?action=retrait&msg=soldenegatif');
                            break;
                        }
                        header('location: ./index.php?action=solde');
                        break;
                    }
                    $this->render('retrait');
                    break;
                }

                case 'virement': {
                    if(isset($_POST['virer'])) {
                        $canIDoIt = $this->retrait($_POST['montant']);

                        if(!$canIDoIt) {
                            header('location: ./index.php?action=virement&msg=soldenegatif');
                            break;
                        }

                        $this->depot($_POST['montant'], $_POST['compte']);
                        header('location: ./index.php?action=solde');
                        break;
                    }
                    $comptes = $this->modeleCompte->getAll();
                    $this->render('virement', ["comptes" => $comptes]);
                    break;
                }
            }
        }
    }

    public function depot($montant, $clientId)
    {
        $compte = $this->modeleCompte->findClientCompte($clientId);
        $newSolde = (float)$compte->getSolde() + (float)$montant;
        $this->modeleCompte->updateSolde($compte, $newSolde);
        $compte->setSolde((float)$compte->getSolde() + (float)$montant);
    }

    public function retrait($montant)
    {
        $compte = $this->modeleCompte->findClientCompte($_SESSION['idClient']);
        $newSolde = (float)$compte->getSolde() - (float)$montant;

        if($newSolde < 0.00) {
            return false;
        } 
      
        $this->modeleCompte->updateSolde($compte, $newSolde);
        $compte->setSolde((float)$compte->getSolde() + (float)$montant);
        return true;

    }
}