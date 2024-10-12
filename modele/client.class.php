<?php 

class ClientModele extends Modele{
    public function ajouter(ClientEntity $client): void
    {
        $r = "INSERT INTO client (clientId, nom, prenom, telephone, email, mdp, dateCreation) VALUES(0, :nom, :prenom, :telephone, :email, :mdp, :dateCreation)";

        $stmt = $this->pdo->prepare($r);
        $stmt->execute([
            ":nom" => $client->getNom(),
            ":prenom" => $client->getPrenom(),
            ":telephone" => $client->getTel(),
            ":email" => $client->getEmail(),
            ":mdp" => $client->getMdp(),
            ":dateCreation" => $client->getDateCreation(),
        ]);
    }

    public function getAll()
    {
        $clientsData = $this->pdo->query('SELECT * FROM client')->fetchAll();
        $clients = [];

        foreach ($clientsData as $clientData) {
            $client = new ClientEntity(
                $clientData['clientId'],
                $clientData['nom'],
                $clientData['prenom'],
                $clientData['telephone'],   
                $clientData['email'],
                $clientData['mdp'],
                $clientData['dateCreation']
            );
            $clients[] = $client;
        }

        return $clients;
    }

    public function hasAccount()
    {
        $requete = "SELECT * FROM comptebancaire WHERE clientId = :clientId";
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute([":clientId" => $_SESSION['idClient']]);
        
        $asAnAccount = $stmt->fetch();
        
        if ($asAnAccount !== false) {
            $_SESSION['hasAccount'] = true;
            return true;
        } else {
            $_SESSION['hasAccount'] = false;
            return false;
        }
    }
}