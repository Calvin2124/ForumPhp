<?php
        $message = null;
    if (isset($_POST["connect_submit"])){
        require_once "connect_bdd.php";
        if (isset($_POST["remember"])){
            setcookie("id", $data["id"], time() + 3600 * 24 * 30);
            setcookie("Connected", True, time() + 3600 * 24 * 30);
        }
        $request = $db->prepare("SELECT user_mail, user_pass, id FROM users WHERE user_mail = :mail");
        $request->execute(array(
            "mail" => $_POST["email"]
        ));
        $data = $request->fetch();
        $password = $_POST["motdepasse"];
        if (password_verify($password, $data["user_pass"])){
            setcookie("id", $data["id"], time() + 3600 * 24);
            setcookie("Connected", True, time() + 3600 * 24);
            header('location: index.php');
        }else {
            $message = "<p style='color:red'>Mot de passe et/ou mail incorrect ! <br> Si vous n'êtes pas inscrit veuillez vous inscrire : <a id='test' href='register.php'>S'inscrire</a></p>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Mini Réseau Social</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <h1>Mini Réseau Social</h1>
    </header>
    <main>
        <h2>Connexion</h2>
        <form action="#" method="post" class="form">
            <div class="form-group">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" id="motdepasse" name="motdepasse" required>
            </div>
            <div class="form-group">
                <label for="remember">Se souvenir de moi :</label>
                <input type="checkbox" id="remember" name="remember">
            </div>
            <button type="submit" name="connect_submit" class="btn btn-blue">Se connecter</button>
        </form>
        <?=$message?>
    </main>
</body>
</html>
