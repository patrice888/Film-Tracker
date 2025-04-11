<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_register.php");
    exit();
}

if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] === 'admin') {
    require_once 'db.php';
    require_once 'navbar.php';

    $id = $_GET["id"];
    $stmt = $pdo->prepare("SELECT * FROM films WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $film = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: geen_toegang.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titel = $_POST['titel'];
    $review = $_POST['review'];
    $datum = $_POST['datum'];
    $poster_url = $_POST['poster_url'];
    $rating = $_POST['rating'];

    $update = $pdo->prepare("UPDATE films SET
    titel = :titel,
    review = :review,
    datum = :datum,
    poster_url = :poster_url,
    rating = :rating
    WHERE id = :id");

    $update->bindParam(':titel', $titel);
    $update->bindParam(':review', $review);
    $update->bindParam(':datum', $datum);
    $update->bindParam(':poster_url', $poster_url);
    $update->bindParam(':rating', $rating);
    $update->bindParam(':id', $id, PDO::PARAM_INT);

    $update->execute();

    header("Location: detail.php?id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Bewerken <?= ($film['title']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="detail-container">
        <h1>Bewerk de Film</h1>
        <form class="form-container" method="POST">
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
        <a href="detail.php?id=<?= $film['id'] ?>">Terug naar de film</a>
    </div>
</body>

</html>