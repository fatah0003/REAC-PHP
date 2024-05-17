<?php
session_start();
require "../config/db.php";
$sql= 'SELECT * FROM messages';
$stmt= $pdo->query($sql);

$result=$stmt->fetchAll();

// var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <div class="chat-container">
            <div class="chat-header">
                <h2>Chat Room</h2>
            </div>
            <div class="chat-messages" id="chat-messages">
                <!-- Les messages apparaîtront ici -->
                <?php
                foreach($result as $row){
                    include "../listings/messages.php";
                }
                ?>
                <!-- Start Message -->
                <!-- Ci-dessous un exemple de structure HTML & CSS d'un message -->
               
                <!-- End Message -->

            </div>
            <div class="chat-input">
                <!-- Le formulaire pour envoyer des messages doit se trouver ci-dessous -->
                <form class="new" action="" method="post" enctype="multipart/form-data">
                <label for="message"></label>
                <input class="message" type="text" id="message" name="message">
                <button type="submit"> Envoyer</button>
                </form> 

                <?php
                

                include "../config/db.php";
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $message = $_POST['message'];
                    $stmt = $pdo->prepare("INSERT INTO messages (message) VALUES (:msg)");
                    $stmt->bindValue(':msg', $message, PDO::PARAM_STR);
                    $stmt->execute();
                }
                ?>
              
            </div>
        </div>
    </body>
</html>
