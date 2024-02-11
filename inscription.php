<?php

require_once 'Connexion_bdd\bdd_text_connexion.php';


if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) { // POST car on utilise la méthode post
    $pseudo = $_POST['pseudo']; // récupère le pseudo de la méthode POST dans le formulaire dans la page d'index
    $password = $_POST['password']; // récupère le mot de passe et le hash
    $confirmPass = $_POST['confirmPassword'];

    // VERIFICATION si le mot de passe et la confirmation est identique
    if ($password != $confirmPass) {
        header('location: /?errorI=1&pass=1');
        exit();
    }

    // VERIFICATION si le pseudo est déjà utiliser
    $requete = $bdd->prepare("SELECT count(*) AS numberPseudo FROM user WHERE pseudo = ?");
    $requete->execute(array($pseudo));

    while ($pseudoVerif = $requete->fetch()) {
        if ($pseudoVerif['numberPseudo'] != 0) {
            header('location: /?errorI=1&pseudo=1');
            exit();
        }
    }

    // HASH du mot de passe après la vérification que les mots de passe soit les mêmes
    $password = password_hash($password, PASSWORD_DEFAULT);

    // ENVOIE la requete si tout est validé
    $requete = $bdd->prepare('INSERT INTO user (pseudo, password) VALUES (?, ?);') or die(print_r($bdd->errorInfo()));

    $requete->execute(array($pseudo, $password)); // les donnés qui sont récupéré ici par les variables

    $requete->closeCursor(); // ferme les requetes vers la base de donnée

    header('location: /?successI=1');
    
}
