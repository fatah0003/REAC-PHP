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
                foreach($result as $index => $row){
                    include "../listings/messages.php";
                }
                ?>
                <!-- Start Message -->
                <!-- Ci-dessous un exemple de structure HTML & CSS d'un message -->
                <div class="message">
                    <span>Bonjour, tu vas bien ?</span>
                    <button class="delete-button">Delete</button>
                </div>
                <!-- End Message -->

            </div>
            <div class="chat-input">
                <!-- Le formulaire pour envoyer des messages doit se trouver ci-dessous -->
                <?php
                require "../listings/form.php";
                ?> 
            </div>
        </div>
    </body>
</html>
