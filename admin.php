<?php
session_start();

// Imposta la password corretta
define('ADMIN_PASSWORD', '233corso'); // <-- cambia con la tua password

// Controllo se password già inserita
if (isset($_SESSION['admin_authenticated']) && $_SESSION['admin_authenticated'] === true) {
    $access_granted = true;
} else {
    $access_granted = false;
}

// Se il form è stato inviato
if (isset($_POST['password'])) {
    if ($_POST['password'] === ADMIN_PASSWORD) {
        $_SESSION['admin_authenticated'] = true;
        $access_granted = true;
    } else {
        // password sbagliata → torna alla home
        header("Location: index.html");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Admin - Aggiungi Rassegna</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f6fa;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    .container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 500px;
    }
    h1 { text-align: center; color: #2f3640; margin-bottom: 25px; }
    label { display: block; margin-bottom: 5px; font-weight: 600; color: #2f3640; }
    input[type="text"], input[type="file"], input[type="password"] {
      width: 100%; padding: 10px 12px; margin-bottom: 20px;
      border-radius: 6px; border: 1px solid #dcdde1; font-size: 1em;
    }
    input:focus { outline: none; border-color: #4cd137; box-shadow: 0 0 5px rgba(76, 209, 55, 0.4); }
    button {
      width: 100%; padding: 12px; background-color: #4cd137;
      border: none; border-radius: 8px; color: #fff; font-size: 1.1em; font-weight: bold;
      cursor: pointer; transition: 0.3s;
    }
    button:hover { background-color: #44bd32; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Admin - Aggiungi Rassegna</h1>

    <?php if (!$access_granted): ?>
      <!-- Form password -->
      <form method="POST">
        <label>Inserisci la password:</label>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Accedi</button>
      </form>
    <?php else: ?>
      <!-- Form upload PDF -->
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Data rassegna:</label>
        <input type="text" name="data" placeholder="Es. 15 Febbraio 2026" required>

        <label>File PDF:</label>
        <input type="file" name="pdf" accept="application/pdf" required>

        <button type="submit">Carica</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
