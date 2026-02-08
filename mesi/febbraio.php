<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "rassegna_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
  die("Connessione fallita: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>GRUPPO</title>
</head>
<body>
  <!-- HEADER / NAVBAR -->
  <header>
    <div class="overlay" id="overlay"></div>
    <div class="nav-container">
      <nav>
        <button class="hamburger" id="hamburgerBtn">☰</button>
        <ul id="navMenu">
          <li><a href="../index.html">Home</a></li>

          <li class="dropdown">
            <a href="#" id="mesiToggle">Mesi ▾</a>
            <div class="dropdown-content" id="mesiMenu">
              <a href="febbraio.php">Febbraio</a>
              <a href="marzo.php">Marzo</a>
              <a href="aprile.php">Aprile</a>
              <a href="maggio.php">Maggio</a>
              <a href="giugno.php">Giugno</a>
              <a href="luglio.php">Luglio</a>
              <a href="agosto.php">Agosto</a>
            </div>
          </li>

          <li><a href="../pages/info.html">Info</a></li>
          <li><a href="../pages/gruppo.html">Gruppo</a></li>
          <li><a href="../pages/turni.html">Turni</a></li>
          <li><a href="../admin.php" class="admin-link">AGGIUNGI</a></li>
        </ul>
      </nav>
      <div class="nav-title">RASSEGNA STAMPA</div>
    </div>
  </header>

    <!-- MAIN -->
  <h1>FEBBRAIO 2026</h1>

  <main class="card-container">

    <div class="grid">
      <?php
      $sql = "SELECT * FROM rassegne WHERE data LIKE '%Febbraio%' ORDER BY id DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $data = $row["data"];
          $file = $row["file"];
          ?>

          <div class="card">
            <div class="pdf-icon">📄</div>
            <div class="date"><?php echo $data; ?></div>
            <div class="card-buttons">
              <a class="btn view" href="../pdf/<?php echo $file; ?>" target="_blank">Visualizza</a>
              <a class="btn download" href="../pdf/<?php echo $file; ?>" download>Scarica</a>
            </div>
          </div>

          <?php
        }
      } else {
        echo "<p>Nessuna rassegna presente.</p>";
      }
      ?>


    </div>
  </main>

  <!-- FOOTER -->
  <footer>
    <p>© 2026 Scuola Allievi Agenti Brescia - Rassegna Stampa By Francesco Thomas Falanga</p>
  </footer>
</body>
    <script src="../js/main.js"></script>
</html>