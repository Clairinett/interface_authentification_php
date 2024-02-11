<?php

// connexion vers une base de donnée
try {
    $bdd = new PDO('mysql:host=localhost;dbname=nomBaseDeDonnees;charset=utf8', 'identifiant', 'motDePasse;');
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}
