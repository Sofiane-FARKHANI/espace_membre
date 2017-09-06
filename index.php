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
                    <input type="submit" value="S'inscrire !">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>