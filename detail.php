<?php

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
    <title>Film Details - <?= ($film['title']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="detail-container">
        <h2><?= ($film['titel']) ?></h2>
        <img src="<?= ($film['poster_url']) ?>" alt="<?= ($film['titel']) ?>" class="film-poster">
        <p><strong>Beschrijving:</strong> <?= ($film['beschrijving']) ?></p>
        <p><strong>Releasejaar:</strong> <?= ($film['releasejaar']) ?></p>
        <p><strong>Regisseur:</strong> <?= ($film['director']) ?></p>
        <p><strong>Rating:</strong> <?= ($film['rating']) ?></p>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $film['youtube_trailer_id'] ?>" frameborder="0" allowfullscreen></iframe>
        <p><a href="edit.php?id=<?= $film['id'] ?>">Bewerk deze film</a></p>
        <a href="index.php" class="back-link">Terug naar het overzicht</a>
    </div>
</body>

</html>