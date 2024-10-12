<?php

class CompteEntity {
    private $id;
    private $numero;
    private $solde;
    private $typeDeCompte;
    private $dateOuverture;
    private $clientId;

    public function __construct($newIdCompte, $newNumeroCompte, $newSoldeCompte, $newTypeDeCompte, $newDateOuverture, $newClientId)
    {
        $this->id = $newIdCompte;
        $this->numero = $newNumeroCompte;
        $this->solde = $newSoldeCompte;
        $this->typeDeCompte = $newTypeDeCompte;
        $this->dateOuverture = $newDateOuverture;
        $this->clientId = $newClientId;
    }

    // getter
    public function getId() { return $this->id; }
    public function getNumeroCompte() { return $this->numero; }
    public function getSolde() { return $this->solde; }
    public function getType() { return $this->typeDeCompte; }
    public function getDateOuverture() { return $this->dateOuverture; }
    public function getClientId() { return $this->clientId; }
    

    // setter
    public function setId($id) { $this->id = $id; }
    public function setNumeroCompte($newNumero) { $this->numero = $newNumero; }
    public function setSolde($newSolde) { $this->solde = $newSolde; }
    public function setType($newType) { $this->typeDeCompte = $newType; }
}