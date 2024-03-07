<?php
    require_once "connect_bdd.php";
    if (isset($_POST["register_submit"])){
        $request = "INSERT INTO users (user_name, user_first_name, user_mail, user_pass) VALUES (:nom, :firstname, :mail, :pass)";
        $data = $db->prepare($request);
        $hash = password_hash($_POST["motdepasse"], PASSWORD_DEFAULT);
        try {
            $data->execute(array(
                "nom" => $_POST["nom"],
                "firstname" => $_POST["prenom"],
                "mail" => $_POST["email"],
                "pass" => $hash
            ));
        }catch(Exception $e) {
            die("Erreur : ". $e->getMessage());
        }
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Mini Réseau Social</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <header>
        <h1>Mini Réseau Social</h1>
    </header>
    <main>
        <h2>Inscription</h2>
        <form action="#" method="post" class="form">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" id="motdepasse" name="motdepasse" required>
            </div>
            <button type="submit" name="register_submit"class="btn">S'inscrire</button>
        </form>
    </main>
</body>
</html>
