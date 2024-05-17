<?php

require "../config/db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $stmt = $pdo->prepare("INSERT INTO messages (message)
    VALUES (:msg)");
    $stmt->bindValue(':msg', $message, PDO::PARAM_STR);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php
include "../listings/form.php";
?>
</body>
</html>