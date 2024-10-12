<?php

class CompteModele extends Modele {
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