<?php

require_once 'db.php';
require_once 'navbar.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titel = $_POST['titel'];
    $review = $_POST['review'];
    $datum = $_POST['datum'];
    $poster_url = $_POST['poster_url'];
    $rating = $_POST['rating'];
    $user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("INSERT INTO films (user_id, titel, review, datum, poster_url, rating) 
VALUES (:user_id, :titel, :review, :datum, :poster_url, :rating)");

$stmt->execute([
    ':user_id' => $user_id,
    ':titel' => $titel,
    ':review' => $review,
    ':datum' => $datum,
    ':poster_url' => $poster_url,
    ':rating' => $rating,
]);

header("location: index.php");
exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Toevoegen</title>
</head>
<body>
    <div class="detail-container">
        <h1>Ik heb gekeken...</h1>
        <form method="POST" class="form-container">
        <label for="titel">Titel</label>
            <input type="text" name="titel" id="titel" value="<?= ($film['titel'] ?? '') ?>" required>

            <label for="review">Review</label>
            <textarea name="review" id="review" required><?= ($film['review'] ?? '') ?></textarea>

            <label for="datum">Datum Bekeken</label>
            <input type="date" name="datum" id="datum" value="<?= ($film['datum'] ?? '') ?>" required>

            <label for="poster_url">Poster URL</label>
            <input type="url" name="poster_url" id="poster_url" value="<?= ($film['poster_url'] ?? '') ?>">

            <label for="rating">Rating</label>
            <input type="number" name="rating" id="rating" min="0" max="10" step="0.1" value="<?= ($film['rating'] ?? '') ?>">

            <button type="submit">Opslaan</button>
        </form>
    </div>
</body>
</html>