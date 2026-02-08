<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Admin - Aggiungi Rassegna</title>
</head>
<body>

  <h1>Aggiungi Rassegna Stampa</h1>

  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Data rassegna:</label><br>
    <input type="text" name="data" required><br><br>

    <label>File PDF:</label><br>
    <input type="file" name="pdf" accept="application/pdf" required><br><br>

    <button type="submit">Carica</button>
  </form>

</body>
</html>
