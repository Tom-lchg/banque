<?php

class CompteModele extends Modele {
    public function create(CompteEntity $compte)
    {
        $r = "INSERT into comptebancaire (compteId, numeroCompte, solde, typeDeCompte, dateOuverture, clientId) VALUES (0, :numeroCompte, :solde, :typeDeCompte, :dateOuverture, :clientId)";
        $stmt = $this->pdo->prepare($r);
        $stmt->execute([
            ":numeroCompte" => $compte->getNumeroCompte(),
            ":solde" => $compte->getSolde(),
            ":typeDeCompte" => $compte->getType(),
            ":dateOuverture" => $compte->getDateOuverture(),
            ":clientId" => $compte->getClientId(),
        ]);
    }

    public function getAll()
    {
        $comptesQuery = $this->pdo->query("
            SELECT c.*, cl.*
            FROM comptebancaire c
            JOIN client cl ON c.clientId = cl.clientId
            WHERE cl.clientId != " . $_SESSION['idClient']
        )->fetchAll();

        $comptes = [];
        
        foreach ($comptesQuery as $compte) {
            $client = new ClientEntity(
                $compte['clientId'],
                $compte['nom'],
                $compte['prenom'],
                $compte['telephone'],
                $compte['email'],
                $compte['mdp'],
                $compte['dateCreation']
            );

            $compteEntity = new CompteEntity(
                $compte['compteId'],
                $compte['numeroCompte'],
                $compte['solde'],
                $compte['typeDeCompte'],
                $compte['dateOuverture'],
                $compte['clientId']
            );

            $comptes[] = [
                'compte' => $compteEntity,
                'client' => $client
            ];
        }

        return $comptes; 
    }

    public function findClientCompte($clientId)
    {
        $r = "SELECT * FROM comptebancaire WHERE clientId = :clientId";
        $stmt = $this->pdo->prepare($r);
        $stmt->execute([
            ":clientId" => $clientId,
        ]);

        $compte = $stmt->fetch();

        return new CompteEntity($compte['compteId'], $compte['numeroCompte'], $compte['solde'], $compte['typeDeCompte'], $compte['dateOuverture'], $compte['clientId']);
    }

    public function updateSolde(CompteEntity $compte, $newSolde)
    {
        $r = "UPDATE comptebancaire SET solde = :solde WHERE clientId = :clientId";
        $stmt = $this->pdo->prepare($r);
        $stmt->execute([
            ":solde" => $newSolde,
            ":clientId" => $compte->getClientId()
        ]);
    }
}