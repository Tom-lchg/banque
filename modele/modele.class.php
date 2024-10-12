<?php

abstract class Modele {
    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=banque;charset=utf8mb4', 'root', '');
    }
}