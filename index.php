<?php

    // Connexion avec la base de données
    $bdd = new PDO("mysql:host=localhost;dbname=git_espace_membre;charset=utf8","root","root");

    // Vérification que l'utilisateur a bien cliqué sur le bouton "S'inscrire !"
    if(isset($_POST['formInscription'])) {


        // Sécurisation du contenu du formulaire pour éviter l'injection de code.
        $nom = htmlspecialchars($_POST['lastName']);
        $prenom = htmlspecialchars($_POST['firstName']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $emailConfirm = htmlspecialchars($_POST['emailConfirm']);

        // Sécurisation des mots de passes pour qu'il ne soit pas en clair dans la base de données
        $motdepasse = sha1($_POST['motdepasse']);
        $motdepasseConfirm = sha1($_POST['motdepasseConfirm']);

        // Vérification du nom de l'utilisateur
        if(isset($nom) AND !empty($nom)) {

            // Obtention de la longueur du nom de l'utilisateur
            $nomLength = strlen($nom);
            if($nomLength <= 255) {


                // Vérification du prénom de l'utilisateur
                if(isset($prenom) AND !empty($prenom)) {

                    // Obtention de la longueur du prénom de l'utilisateur
                    $prenomLength = strlen($prenom);
                    if($prenomLength <= 255) {

                        // Vérification du pseudo
                        if(isset($pseudo) AND !empty($pseudo)) {

                            // Récupération des pseudos dans la base de données
                            $reqUser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
                            $reqUser->execute(array($pseudo));

                            // On compte le nombre de ligne
                            $pseudoExist = $reqUser->rowCount();

                            // Vérification de l'existance du pseudo
                            if($pseudoExist == 0) {

                                // Obtention de la taille du pseudo
                                $pseudoLength = strlen($pseudo);

                                if($pseudoLength <= 255) {

                                    // Vérification de l'envoi du mail
                                    if(isset($email) AND !empty($email)) {

                                        // Vérification que l'adresse mail est valide
                                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                                            $emailLength = strlen($email);
                                            if($emailLength <= 255) {

                                                // Vérification de la confirmation de l'email
                                                if(isset($emailConfirm) AND !empty($emailConfirm)) {

                                                    // Vérification que les 2 adresses mail soit bien identique
                                                    if($email == $emailConfirm) {

                                                        // Vérification du mot de passe
                                                        if(isset($motdepasse) AND !empty($motdepasse)) {

                                                            $motdepasseLength = strlen($motdepasse);
                                                            if($motdepasseLength <= 255) {

                                                                // Vérification de la confirmation du mot de passe
                                                                if(isset($motdepasseConfirm) AND !empty($motdepasseConfirm)) {

                                                                    // Vérification que les 2 mots de passes soient bien identique
                                                                    if($motdepasse == $motdepasseConfirm) {

                                                                        // Insertion des informations dans la base de données
                                                                        $insertUser = $bdd->prepare("INSERT INTO membres(nom,prenom,pseudo,mail,password) VALUES (?,?,?,?,?)");
                                                                        $insertUser->execute(array($nom,$prenom,$pseudo,$email,$motdepasse));

                                                                        // On informe l'utilisateur que l'insertion a bien été effectué
                                                                        $msgErreur = "Votre compte a bien été créé !";

                                                                    } else {
                                                                        $msgErreur = "Vos 2 mots de passes doivent être identique !";
                                                                    }

                                                                } else {
                                                                    $msgErreur = "Vous devez saisir la confirmation du mot de passe !";
                                                                }

                                                            } else {
                                                                $msgErreur = "Votre mot de passe ne doit pas dépasser les 255 caractères !";
                                                            }

                                                        } else {
                                                            $msgErreur = "Vous devez saisir un mot de passe !";
                                                        }

                                                    } else {
                                                        $msgErreur = "Vos adresses mail doivent être identique !";
                                                    }

                                                } else {
                                                    $msgErreur = "Vous devez saisir la confirmation de votre adresse mail";
                                                }

                                            } else {
                                                $msgErreur = "Votre adresse mail ne doit dépasser 255 caractères !";
                                            }

                                        } else {
                                            $msgErreur = "Votre adresse mail doit être valide !";
                                        }

                                    } else {
                                        $msgErreur = "Vous devez saisir une adresse mail !";
                                    }

                                } else {
                                    $msgErreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
                                }

                            } else {
                                $msgErreur = "Le pseudo ".$pseudo." est déjà utilisé !";
                            }

                        } else {
                            $msgErreur = "Vous devez saisir un pseudo !";
                        }

                    } else {
                        $msgErreur = "Votre prénom ne doit pas dépasser 255 caractères !";
                    }

                } else {
                    $msgErreur = "Vous devez saisir un prénom !";
                }

            } else {
                $msgErreur = "Votre nom ne doit pas dépasser 255 caractères !";
            }

        } else {
            $msgErreur = "Vous devez saisir un nom !";
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Membre - Inscription</title>
</head>
<body>
    <header>
        <h1>Inscription</h1>
    </header>

    <!-- Formulaire d'inscription -->
    <form method="post" action="">
        <table>
            <tr>
                <td>
                    <label for="lastName">Nom : </label>
                </td>
                <td>
                    <input type="text" name="lastName" id="lastName" placeholder="Nom" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="firstName">Prénom : </label>
                </td>
                <td>
                    <input type="text" name="firstName" id="firstName" placeholder="Prénom" required autofocus>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pseudo">Pseudo : </label>
                </td>
                <td>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email : </label>
                </td>
                <td>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="emailConfirm">Confirmation de l'email : </label>
                </td>
                <td>
                    <input type="email" name="emailConfirm" id="emailConfirm" placeholder="Confirmation de l'email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="motdepasse">Mot de passe : </label>
                </td>
                <td>
                    <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de passe" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="motdepasseConfirm">Confirmation mot de passe : </label>
                </td>
                <td>
                    <input type="password" name="motdepasseConfirm" id="motdepasseConfirm" placeholder="Confirmation mot de passe" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="S'inscrire !" name="formInscription">
                </td>
            </tr>

            <!-- Affichage des messages d'erreur -->
            <tr>
                <td></td>
                <td>
                    <?php
                        echo '<font color="red">'.$msgErreur.'</font>';
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>