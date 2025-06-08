<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_edacy"; 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // Définir le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie";
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
?>