<?php

require_once 'db.php';

function registerUser($pdo, $gebruikersnaam, $wachtwoord)
{
    $stmt = $pdo->prepare("SELECT gebruikersnaam FROM users WHERE gebruikersnaam = :gebruikersnaam");
    $stmt->execute([':gebruikersnaam' => $gebruikersnaam]);
    if ($stmt->fetch()) {
        return "Deze gebruikersnaam is al in gebruik.";
    }
    $hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (gebruikersnaam, wachtwoord) VALUES (:gebruikersnaam, :wachtwoord)");
    if ($stmt->execute([':gebruikersnaam' => $gebruikersnaam, ':wachtwoord' => $hashed_wachtwoord])) {
        return "Registratie succesvol! Je kunt nu inloggen.";
    } else {
        return "Er is een fout bij de registratie.";
    }
}

function loginUser($pdo, $gebruikersnaam, $wachtwoord)
{
    $stmt = $pdo->prepare("SELECT id, wachtwoord, rol FROM users WHERE gebruikersnaam = :gebruikersnaam");
    $stmt->execute([':gebruikersnaam' => $gebruikersnaam]);
    $user = $stmt->fetch();
    if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_rol'] = $user['rol'];
        header("Location: index.php");
        exit;
    } else {
        return "Ongeldige gebruikersnaam of wachtwoord.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $registerMessage = registerUser($pdo, $_POST['gebruikersnaam'], $_POST['wachtwoord']);
    } elseif (isset($_POST['login'])) {
        $loginMessage = loginUser($pdo, $_POST['gebruikersnaam'], $_POST['wachtwoord']);
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registratie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="detail-container">
        <?php if (isset($loginMessage)): ?>
            <p class="error"><?php echo $loginMessage; ?></p>
        <?php endif; ?>

        <?php if (isset($registerMessage)): ?>
            <p class="success"><?php echo $registerMessage; ?></p>
        <?php endif; ?>

        <h2>Inloggen</h2>
        <form method="POST">
            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" name="gebruikersnaam" id="gebruikersnaam" required><br><br>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" name="wachtwoord" id="wachtwoord" required><br><br>

            <button type="submit" name="login">Log in</button>
        </form>

        <hr>

        <h2>Registreren</h2>
        <form method="POST">
            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" name="gebruikersnaam" id="gebruikersnaam" required><br><br>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" name="wachtwoord" id="wachtwoord" required><br><br>

            <button type="submit" name="register">Registreer</button>
        </form>
    </div>
</body>

</html>