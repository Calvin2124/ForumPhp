<?php
    require_once "connect_bdd.php";
    if (empty($_COOKIE["Connected"])){
        header('location: login.php');
    }
    if (isset($_POST["add_message"])){
        $request = "INSERT INTO messages(user_id, user_message, date_heure) VALUES(:id, :mess, :date_heure)";
        $data = $db->prepare($request);
        try{
            $data->execute(array(
                "id" => $_COOKIE["id"], 
                "mess" => $_POST["message"],
                "date_heure" => $_POST["date_heure"]
            ));
        }catch(Exception $e) {
            die("Erreur : ".$e->getMessage());
        }header('location: index.php');
    }
    if (isset($_POST["delete"])){
        $request = "DELETE FROM messages WHERE id = :id";
        $data = $db->prepare($request);
        try{
            $data->execute(array(
                "id" => $_POST["id"]
            ));
        }catch(Exception $e) {
            die("Erreur : ".$e->getMessage());
        }
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Réseau Social</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<dialog id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Modifier mon message</h2>
        <p>Il faudra mettre le formulaire et les boutons "annuler et modifier</p>
    </div>
</dialog>
    <nav class="navbar">
        <div class="container">
            <h1>Mini Réseau Social</h1>
            <div class="navbar-buttons">
                <button class="profile-btn">Profil</button>
                <button class="logout-btn"><a href="acceuil.php?logout=true">Déconnexion</a></button>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="post-form">
            <form action="#" method="post" class="postForm">
                <textarea name="message" id="message" placeholder="Exprimez-vous..." rows="4"></textarea>
                <input type="hidden" name="date_heure" value="<?=date('d/m/Y H:i:s')?>">
                <button type="submit" name="add_message" class="post-btn">Publier</button>
            </form>
        </div>
                <?php
                    $request = $db->prepare("SELECT id, user_id, user_message, date_heure FROM messages ORDER BY date_heure DESC");
                    $request->execute();
                    $datas = $request->fetchAll();
                    foreach($datas as $data){
                ?>
        <div id="posts">
            <!-- Les messages publiés seront ajoutés ici -->
            <div class="post">
                <h2>Prénom Nom</h2>
                <p><?=htmlspecialchars($data["user_message"])?></p>
                <p id="date_heure"><?=$data["date_heure"]?></p>
                <?php
                    if ($data["user_id"] == $_COOKIE["id"]){
                ?>
                <div id="form_modify_del">
                <button id="edit" class="edit-btn">Modifier</button>
                    <form action="#" method="post">
                        <input type="hidden" name="id" value="<?=$data["id"]?>">
                        <input type="submit" value="Supprimer" class="delete-btn" name="delete">
                    </form>
                </div>
                <?php
                    }
                ?>
            </div>
                <?php
                }
                ?>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
