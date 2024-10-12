<?php

class ClientEntity {
    private $idClient;
    private $nomClient;
    private $prenomClient;
    private $mdpClient;
    private $telClient;
    private $emailClient;
    private $dateCreationClient;

    public function __construct($newIdClient, $newNomClient, $newPrenomClient, $newTelClient, $newEmailClient, $newMdpClient, $newDateCreationClient)
    {
        $this->idClient = $newIdClient;
        $this->nomClient = $newNomClient;
        $this->prenomClient = $newPrenomClient;
        $this->telClient = $newTelClient;
        $this->emailClient = $newEmailClient;
        $this->mdpClient = $newMdpClient;
        $this->dateCreationClient = $newDateCreationClient;
    }

    // getter
    public function getId() { return $this->idClient; }
    public function getNom() { return $this->nomClient; }
    public function getPrenom() { return $this->prenomClient; }
    public function getTel() { return $this->telClient; }
    public function getEmail() { return $this->emailClient; }
    public function getMdp() { return $this->mdpClient; }
    public function getDateCreation() { return $this->dateCreationClient; }
    

    // setter
    public function setId($id) { $this->idClient = $id; }
    public function setNom($newNom) { $this->idClient = $newNom; }
    public function setPrenom($newPrenom) { $this->idClient = $newPrenom; }
    public function setTel($newTelClient) { $this->idClient = $newTelClient; }
    public function setEmail($newEmailClient) { $this->idClient = $newEmailClient; }
    public function setMdp($newMdpClient) { $this->mdpClient = $newMdpClient; }
    public function setDateCreation($newDateCreationClient) { $this->idClient = $newDateCreationClient; }
}