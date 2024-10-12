<?php 

// include client entity
include './entity/client.class.php';
include './modele/modele.class.php';

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
}