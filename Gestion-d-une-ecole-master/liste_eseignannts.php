<?php include("config.php"); ?>
<?php
include("connexion.php");

$result = mysqli_query($connexion, "SELECT * FROM enseignants");
?>

<h2>Liste des enseignants</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Spécialité</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nom']) ?></td>
            <td><?= htmlspecialchars($row['prenom']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['telephone']) ?></td>
            <td><?= htmlspecialchars($row['specialite']) ?></td>
            <td>
                <a href="modifier_enseignant.php?id=<?= $row['id'] ?>">Modifier</a> |
                <a href="supprimer_enseignant.php?id=<?= $row['id'] ?>" onclick="return confirm('Supprimer cet enseignant ?');">Supprimer</a>
            </td>
        </tr>
    <?php } ?>
</table>