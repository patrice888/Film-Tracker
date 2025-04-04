<?php

require_once 'db.php';
require_once 'navbar.php';

$sql = "SELECT id, titel, poster_url FROM films";
$stmt = $pdo->query($sql);
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <div class="film-container">
        <?php foreach ($films as $film): ?>
            <div class="film">
                <a href="detail.php?id=<?php echo $film['id']; ?>">
                    <img src="<?php echo $film['poster_url']; ?>" alt="<?php echo ($film['titel']); ?>" class="film-poster">
                </a>
                <h2 class="film-titel"><?php echo ($film['titel']); ?></h2>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>