<?php include("config.php"); ?>
<?php
include("connexion.php");

$id = $_GET['id'];
$result = mysqli_query($connexion, "SELECT * FROM enseignants WHERE id=$id");
$enseignant = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $specialite = $_POST["specialite"];

    $sql = "UPDATE enseignants SET 
            nom='$nom',
            prenom='$prenom',
            email='$email',
            telephone='$telephone',
            specialite='$specialite'
            WHERE id=$id";

    if (mysqli_query($connexion, $sql)) {
        echo "Mise à jour réussie. <a href='liste_enseignants.php'>Retour à la liste</a>";
        exit;
    } else {
        echo "Erreur : " . mysqli_error($connexion);
    }
}
?>

<h2>Modifier Enseignant</h2>
<form method="post">
    <label>Nom:</label><input type="text" name="nom" value="<?= htmlspecialchars($enseignant['nom']) ?>" required><br>
    <label>Prénom:</label><input type="text" name="prenom" value="<?= htmlspecialchars($enseignant['prenom']) ?>" required><br>
    <label>Email:</label><input type="email" name="email" value="<?= htmlspecialchars($enseignant['email']) ?>"><br>
    <label>Téléphone:</label><input type="text" name="telephone" value="<?= htmlspecialchars($enseignant['telephone']) ?>"><br>
    <label>Spécialité:</label><input type="text" name="specialite" value="<?= htmlspecialchars($enseignant['specialite']) ?>"><br>
    <input type="submit" value="Enregistrer les modifications">
</form>