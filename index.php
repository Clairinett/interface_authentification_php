<?php
    require_once 'connexion.php';
    require_once 'inscription.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Interface de test pour ce connecter dans une bdd avec php">
        <title>Test de Connexion</title>
        <link href="Assets\CSS\index.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="autre\upload\logo_claire_inc.svg">
    </head>

    <body>
        <section>
            <h1>Inscription</h1>

            <?php
                if (isset($_GET['errorI'])) {
                    if (isset($_GET['pass'])) {
                        echo '<p class="error">Les mots de passes ne sont pas identiques.</p>';
                    } elseif (isset($_GET['pseudo'])) {
                        echo '<p class="error">Le pseudo est déjà utilisé.</p>';
                    }
                } elseif (isset($_GET['successI'])) {
                    echo '<p class="success">Vous vous êtes inscrit avec succès.</p>';
                }
            ?>

            <form method="POST" action="inscription.php">

                <label for=pseudo>Entrez votre pseudo</label><br>
                <input name="pseudo" type="text" placeholder="pseudo" required="required"><br><br>

                <label for="password">Entrez votre mot de passe</label><br>
                <input name="password" type="password" placeholder="Mot de passe" required="required"><br><br>

                <label for="confirmPassword">Confirmer le mot de passe</label><br>
                <input name="confirmPassword" type="password" placeholder="Mot de passe" required="required"><br><br>

                <button type="submit">Inscription</button>
            </form>
        </section>

        <section>
            <h1>Connexion</h1>

            <?php
                if (isset($_GET['errorC'])) {
                    echo '<p class="error">Nous ne pouvons pas vous connectez.</p>';
                } elseif (isset($_GET['successC'])) {
                    echo '<p class="success">Vous êtes bien connecté.</p>';
                }
            ?>

            <form method="POST" action="connexion.php">

                <label for=pseudo>Entrez votre pseudo</label><br>
                <input name="pseudo" type="text" placeholder="pseudo" required="required"><br><br>

                <label for="passwors">Entrez votre mot de passe</label><br>
                <input name="password" type="password" placeholder="Mot de passe" required="required"><br><br>

                <button type="submit">Connexion</button>
            </form>
        </section>
    </body>
</html>
