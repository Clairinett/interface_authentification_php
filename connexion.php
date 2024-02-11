<?php

require_once 'Connexion_bdd\bdd_text_connexion.php';

if (isset($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
    $pseudo = $_POST['pseudo']; // récupère la donné de pseudo
    $password = $_POST['password']; // récupère le mot de passe et le hash


    // vérifer le pseudo
    $requete = $bdd->prepare('SELECT * FROM user WHERE pseudo = ?');
    $requete->execute(array($pseudo));

    
    while ($user = $requete->fetch()) {

        $passwordHash = $user['password'];

        if (password_verify($password, $passwordHash)) {
            header('location: /?successC=1');
            exit();
        }
    }

    header('location: /?errorC=1');

    $requete->closeCursor(); // ferme les requetes vers la base de données
}
