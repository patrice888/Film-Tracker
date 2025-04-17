<?php

require_once 'db.php';
require_once 'navbar.php';

session_start();

$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'titel';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

if (isset($_SESSION['user_id']) && isset($_SESSION['user_rol']) && $_SESSION['user_rol'] === 'admin') {
    $sql = "SELECT id, titel, poster_url, rating, datum, user_id FROM films ORDER BY $sortColumn $sortOrder ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
} elseif (isset($_SESSION['user_id'])) {
    $sql = "SELECT id, titel, poster_url, rating, datum FROM films WHERE user_id = :user_id ORDER BY $sortColumn $sortOrder ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$ratingOrder = ($sortColumn == 'rating' && $sortOrder == 'ASC') ? 'DESC' : 'ASC';
$datumOrder = ($sortColumn == 'datum' && $sortOrder == 'ASC') ? 'DESC' : 'ASC';

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Bekeken Films</h2>
    <div class="order">
        <a href="index.php?sort=rating&order=<?php echo $ratingOrder; ?>">Rating
            <?php if ($sortColumn == 'rating'): ?>
                <?php echo ($sortOrder == 'ASC') ? '↑' : '↓'; ?>
            <?php endif; ?>
        </a>
        <a href="index.php?sort=datum&order=<?php echo $datumOrder; ?>">Datum Bekeken
            <?php if ($sortColumn == 'datum'): ?>
                <?php echo ($sortOrder == 'ASC') ? '↑' : '↓'; ?>
            <?php endif; ?>
        </a>
    </div>

    <div class="film-container">
        <?php foreach ($films as $film): ?>
            <div class="film">
                <a href="detail.php?id=<?php echo $film['id']; ?>">
                    <img src="<?php echo $film['poster_url']; ?>" alt="" class="film-poster">
                </a>
                <h2 class="film-titel"><?php echo ($film['titel']); ?></h2>
                <p class="film-rating">⭐ <?php echo ($film['rating']); ?></p>
                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] === 'admin'): ?>
                    <?php
                    $userStmt = $pdo->prepare("SELECT gebruikersnaam FROM users WHERE id = :user_id");
                    $userStmt->bindParam(':user_id', $film['user_id'], PDO::PARAM_INT);
                    $userStmt->execute();
                    $user = $userStmt->fetch(PDO::FETCH_ASSOC);
                    if ($user): ?>
                        <p class="added-by">Toegevoegd door: <?php echo ($user['gebruikersnaam']); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>