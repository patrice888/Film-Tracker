<?php

require_once 'db.php';
require_once 'navbar.php';

$id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM films WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$film = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $releasejaar = $_POST['releasejaar'];
    $director = $_POST['director'];
    $poster_url = $_POST['poster_url'];
    $rating = $_POST['rating'];
    $youtube_trailer_id = $_POST['youtube_trailer_id'];

    $update = $pdo->prepare("UPDATE movies SET 
    titel = :titel, 
    beschrijving = :beschrijving, 
    releasejaar = :releasejaar, 
    director = :director, 
    poster_url = :poster_url,
    rating = :rating,
    youtube_trailer_id = :youtube_trailer_id, 
    WHERE id = :id");

    $update->bindParam(':titel', $titel);
    $update->bindParam(':beschrijving', $beschrijving);
    $update->bindParam(':releasejaar', $releasejaar);
    $update->bindParam(':director', $director);
    $update->bindParam(':poster_url', $poster_url);
    $update->bindParam(':rating', $rating);
    $update->bindParam(':youtube_trailer_id', $youtube_trailer_id);
    $update->bindParam(':id', $id, PDO::PARAM_INT);

    $updateStmt->execute();

    header("Location: detail.php?id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Bewerken</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="detail-container">
        <h1>Bewerk de Film</h1>

        <form class="form-container" method="POST">
            <label for="titel">Titel</label>
            <input type="text" name="titel" id="titel" value="<?= ($film['titel'] ?? '') ?>" required>

            <label for="beschrijving">Beschrijving</label>
            <textarea name="beschrijving" id="beschrijving" required><?= ($film['beschrijving'] ?? '') ?></textarea>

            <label for="releasejaar">Release Jaar</label>
            <input type="number" name="releasejaar" id="releasejaar" value="<?= ($film['releasejaar'] ?? '') ?>" required>

            <label for="director">Regisseur</label>
            <input type="text" name="director" id="director" value="<?= ($film['director'] ?? '') ?>">

            <label for="poster_url">Poster URL</label>
            <input type="url" name="poster_url" id="poster_url" value="<?= ($film['poster_url'] ?? '') ?>">

            <label for="rating">Rating</label>
            <input type="number" name="rating" id="rating" min="0" max="10" step="0.1" value="<?= ($film['rating'] ?? '') ?>">

            <label for="youtube_trailer_id">YouTube Trailer ID</label>
            <input type="text" name="youtube_trailer_id" id="youtube_trailer_id" value="<?= ($film['youtube_trailer_id'] ?? '') ?>">

            <button type="submit">Opslaan</button>
        </form>

        <a href="detail.php?id=<?= ($film['id'] ?? '') ?>">Terug naar de film</a>
        </div>

</body>

</html>