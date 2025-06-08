<?php include("config.php"); ?>
<?php
include("connexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM enseignants WHERE id=$id";

if (mysqli_query($connexion, $sql)) {
    header("Location: liste_enseignants.php");
    exit;
} else {
    echo "Erreur lors de la suppression : " . mysqli_error($connexion);
}   