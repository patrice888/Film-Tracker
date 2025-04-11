<?php

require_once 'db.php';
require_once 'navbar.php';

$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'titel';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

$sql = "SELECT id, titel, poster_url, rating, datum FROM films ORDER BY $sortColumn $sortOrder";
$stmt = $pdo->query($sql);
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                    <img src="<?php echo $film['poster_url']; ?>" alt="<?php echo ($film['titel']); ?>" class="film-poster">
                </a>
                <h2 class="film-titel"><?php echo ($film['titel']); ?></h2>
                <?php if (isset($film['rating'])): ?>
                    <p class="film-rating">⭐ <?php echo ($film['rating']); ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>