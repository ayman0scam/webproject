<?php include("config.php"); ?>
<?php
include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $specialite = $_POST["specialite"];

    $sql = "INSERT INTO enseignants (nom, prenom, email, telephone, specialite)
            VALUES ('$nom', '$prenom', '$email', '$telephone', '$specialite')";

    if (mysqli_query($connexion, $sql)) {
        echo "Enseignant ajouté avec succès.";
    } else {
        echo "Erreur: " . mysqli_error($connexion);
    }
}
?>

<form method="post">
    <label>Nom:</label><input type="text" name="nom" required><br>
    <label>Prénom:</label><input type="text" name="prenom" required><br>
    <label>Email:</label><input type="email" name="email"><br>
    <label>Téléphone:</label><input type="text" name="telephone"><br>
    <label>Spécialité:</label><input type="text" name="specialite"><br>
    <input type="submit" value="Ajouter Enseignant">
</form>