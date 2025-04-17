<?php
session_start();

require_once 'db.php';
require_once 'navbar.php';

$id = $_GET["id"];
$stmt = $pdo->query("SELECT * FROM films WHERE id = $id");
$film = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="detail-container">
        <h2><?= ($film['titel']) ?></h2>
        <img src="<?= ($film['poster_url']) ?>" class="film-poster">
        <p><strong>Review:</strong> <?= ($film['review']) ?> ✍️</p>
        <p><strong>Datum Bekeken :</strong> <?= ($film['datum'])?> 👀</p>
        <p><strong>Rating:</strong> <?= ($film['rating']) ?>⭐</p>

        <a href="edit.php?id=<?= $film['id'] ?>">Bewerk deze film</a>
        <a href="delete.php?id=<?= $film['id'] ?>" onclick="return confirm('Weet je zeker dat je deze film wilt verwijderen?')">Verwijderen</a>
        <a href="index.php" class="back-link">Terug naar het overzicht</a>
    </div>
</body>

</html>