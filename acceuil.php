<?php
    if(!empty($_GET["logout"])){
        setcookie("remember", False, -1);
        setcookie("id", False, -1);
        setcookie("Connected", False, -1);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Mini Réseau Social</title>
    <link rel="stylesheet" href="css/acceuil.css">
</head>
<body>
    <header>
        <h1>Mini Réseau Social</h1>
    </header>
    <main>
        <h2>Rejoignez notre communauté dès aujourd'hui</h2>
        <div class="cta-buttons">
            <a href="register.php" class="btn">S'inscrire</a>
            <a href="login.php" class="btn">Se connecter</a>
        </div>
    </main>
</body>
</html>
